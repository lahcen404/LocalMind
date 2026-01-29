<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRole;
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
    ];


    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // relation with question
    public function questions()
{
    return $this->hasMany(Question::class);
}

    // relation with response
    public function responses(){
        return $this->hasMany(Response::class);
    }
    // relation with favorite questions

    public function favoriteQuestions(){
        return $this->belongsToMany(Question::class, 'favorites')->withTimestamps();
    }

    

    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }
}
