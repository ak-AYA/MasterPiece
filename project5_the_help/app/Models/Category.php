<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category  extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',  
        'status',
    ];

    /**
     * Define the relationship with services.
     * A category can have many services.
     */
    
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
    

}
