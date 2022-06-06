<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    protected $fillable = ['name','area_id','category_id','overview','url'];
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $fav_users = array();
        
        foreach($this->favorites as $favorite) {
            array_push($fav_users, $favorite->user_id);
        }

        if (in_array($id, $fav_users)) {
        return true;
        } else {
        return false;
        }
    }
}
