<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use  HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name','image','gender','age','type','access_code','password'
    ];

    public function toArray()
    {
        return collect(parent::toArray())->merge([
            'type' => $this->type ? 'admin' : 'client'
        ]);
    }

    protected $hidden = ['password','first_time_login','remember_token','user_id'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
