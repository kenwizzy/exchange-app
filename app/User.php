<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Bavix\Wallet\Traits\HasWalletFloat;
use Bavix\Wallet\Interfaces\WalletFloat;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Traits\HasWallets;
use Bavix\Wallet\Interfaces\Wallet;

class User extends Authenticatable implements Wallet, WalletFloat
{
    use Notifiable, HasWallet, HasWallets, HasWalletFloat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'national',
        'phone',
        'DOB',
        'email',
        'password',
        'code',
        'subaccount_id',
        'referrer_id',
        'two_factor_expires_at',
        'two_factor_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
    ];

        /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['referral_link'];

    public function getReferralLinkAttribute(){
    return $this->referral_link = route('register', ['ref' => $this->firstname.'-'.$this->id]);
    }

    public function userActivationCode(){

        return $this->hasOne(ActivationCode::class);

    }

    public function userIsActivated(){
        
        if($this->active){

            return true;
        }

        return false;
    }

    public function generateTwoFactorCode(){
    $this->timestamps = false;
    $this->two_factor_code = rand(100000, 999999);
    $this->two_factor_expires_at = now()->addMinutes(10);
    $this->save();
    }

    public function setPin(){
        $this->upin = rand(1000, 9999);
        $this->save();
    }

    public function resetTwoFactorCode(){
    $this->timestamps = false;
    $this->two_factor_code = null;
    $this->two_factor_expires_at = null;
    $this->save();
    }

    public function referrer(){
    return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    public function referrals(){
    return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    public function cards(){
        return $this->hasMany(Card::class);
    }

    public function giftcards(){
        return $this->hasMany(Giftcard::class);
    }

    public function account(){
        return $this->hasOne(Account::class);
    }

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function withdraws(){
        return $this->hasMany(Withdrwal::class);
    }

    public function notifies(){
        return $this->hasMany(Notification::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(){
        if($this->role->name == 'Admin'){
            return true;
        }

        return false;
    }

    public function loginSecurity()
{
    return $this->hasOne(LoginSecurity::class);
}

public function airtimeExchange(){
    return $this->hasMany(AirtimeConfirmation::class);
}

}
