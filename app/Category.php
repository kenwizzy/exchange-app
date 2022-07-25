<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public function subcats(){
        return $this->hasMany(SubCategory::class);
    }

}
