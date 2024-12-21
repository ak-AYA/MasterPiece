<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'provider_id',
        'status',
        'category_id', // Category for the service
    ];

    /**
     * Get the provider associated with the service.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    /**
     * Get the category associated with the service.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    

    /**
     * Get the category image for the service (not stored in service table).
     */
    public function getCategoryImage()
    {
        return $this->category ? $this->category->image : null; // Fetch the image from category
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


}