<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['user_id', 'balance', 'bank_name', 'account_number', 'holder_name'];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
