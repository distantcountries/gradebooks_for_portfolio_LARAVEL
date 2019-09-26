<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'firstName', 'lastName', 'email', 'password'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function gradebook()
    {
        return $this->hasOne(Gradebook::class);
    }

    public function images()
    {
        return $this->hasMany(UserImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}


