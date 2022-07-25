<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminTransaction extends Model
{
    protected $fillable = [
        'giftcard_id',
        'user_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'payment_ref'
    ];
}
