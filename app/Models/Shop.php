<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = array('id');
    
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function booking(){
    return $this->hasMany('App\Models\Booking');
    }

    public function favorite(){
    return $this->hasMany('App\Models\Favorite');
    }
}
