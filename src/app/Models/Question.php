<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    use HasFactory;

    protected $fillable = [
        'title','content','location','user_id'
    ];

    // relationship with user
    public function user(){

        return $this->belongsTo(User::class);
    }

    // relation with response
    public function responses(){
        return $this->hasMany(Response::class);
    }

    public function isFavoritedBy(?User $user): bool
    {
        if (!$user) return false;
        
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
