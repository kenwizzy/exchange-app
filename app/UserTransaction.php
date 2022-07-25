<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $table = 'user_transactions';
    protected $fillable = [
        'user_id',
        'amount',
        'calculated_amt',
        'currency',
        'payment_method',
        'status',
        'payment_ref',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
