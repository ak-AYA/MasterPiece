<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    // Define which fields are mass assignable
    protected $fillable = [
        'date',
        'time',
        'status',
        'user_id',
        'service_id',
        'payment_id',
        'discount_id',
        'total_price',
    ];

    // Define relationships with other models
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class); 
    }

}
