<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
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
    return $this->hasMany(Service::class);
}

}
