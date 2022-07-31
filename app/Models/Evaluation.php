<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['booking_id', 'evaluation', 'comment'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
