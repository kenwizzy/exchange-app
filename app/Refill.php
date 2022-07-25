<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refill extends Model
{
    protected $fillable = ['data', 'expiry'];
    protected $table = 'refills';
    protected $primaryKey = 'id';
}
