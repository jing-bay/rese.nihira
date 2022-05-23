<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = array('id');

    public function shop(){
    return $this->hasMany('App\Models\Shop');
    }
}


