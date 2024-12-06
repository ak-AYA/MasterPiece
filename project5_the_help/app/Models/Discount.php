<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'discounts';

    // The attributes that are mass assignable.
    protected $fillable = [
        'amount', 
        'date_start', 
        'date_end', 
        'code', 
        'status',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'date_start' => 'datetime',
        'date_end' => 'datetime',
    ];

    // If you need to add any custom logic, you can create methods here.
}
