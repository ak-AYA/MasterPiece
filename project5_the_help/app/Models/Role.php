<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'role';

    protected $fillable = ['name'];

    /**
     * Define the relationship between Role and Users.
     * Each role can have many users.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }


    public function providers()
    {
        return $this->hasMany(Provider::class, 'role_id');
    }

    
}
