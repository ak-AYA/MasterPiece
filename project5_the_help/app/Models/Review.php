<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'Reviews'; 

    protected $fillable = [
        'stars',
        'text',
        'image',
        'date',
        'is_approved',
        'user_id',
        'provider_id',
    ];


// Review from users
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

// Review for providers
public function provider()
{
    return $this->belongsTo(provider::class, 'provider_id'); 
}


}