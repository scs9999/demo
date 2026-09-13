<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'login', 'phone', 'email', 'password', 'is_admin'];

    protected $hidden = ['password', 'remember_token'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
