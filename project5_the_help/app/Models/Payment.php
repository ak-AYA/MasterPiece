<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_active', 'logo_url'];

    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
