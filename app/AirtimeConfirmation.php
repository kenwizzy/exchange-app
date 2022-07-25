<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirtimeConfirmation extends Model
{
    protected $fillable = ['user_id','network','amount','from','receive','screenshot','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
