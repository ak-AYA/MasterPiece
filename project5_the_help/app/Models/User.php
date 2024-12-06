<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'location',
        'status',
        'role_id',
    ];
    
    // Relationship with Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}