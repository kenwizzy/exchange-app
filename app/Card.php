<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['user_id', 'card_account_id', 'card_id', 'billing_name', 'balance', 'expiration'];

    protected $table = 'cards';
}
