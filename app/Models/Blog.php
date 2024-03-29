<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Blog extends Model implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text'
    ];

    protected $hidden = ['user_id'];


    public function toArray()
    {
        return collect(parent::toArray())->merge([
            'user' => $this->user,
            'tags' => $this->tags,
            'comments' => $this->comments
        ]);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
