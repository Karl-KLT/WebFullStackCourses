<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name','image','gender','age','type','access_'
    ];

    public function toArray()
    {
        return collect(parent::toArray())->merge([
            'type' => $this->type ? 'admin' : 'client'
        ]);
    }

    protected $hidden = ['password','first_time_login','remember_token'];
}
