<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrwal extends Model
{
    protected $fillable = ['user_id', 'amount', 'bank_name', 'account_number', 'account_name', 'status'];

    protected $table = 'withdrawals';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
