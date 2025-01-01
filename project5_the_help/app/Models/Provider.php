<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Authenticatable
{
    use HasFactory;

    // Define fillable attributes
    protected $fillable = ['name', 'email', 'phone', 'password', 'location', 'status', 'role_id'];

    /**
     * Define the relationship between Provider and Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function services()
    {
        return $this->hasMany(Service::class, 'provider_id');
    }
    

    public function reviews()
    {
        return $this->hasMany(Review::class, 'provider_id'); 
    }

}
