<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giftcard extends Model
{
    protected $fillable = [
        'cat',
        'sub_cat',
        'user_id',
        'payment_method',
        'calculated_amount',
        'giftcard_amt',
        'file_id',
        'comment',
        'status'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function SubCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
