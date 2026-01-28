<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title','content','location','user_id'
    ];

    // relationship with user
    public function user(){

        return $this->belongsTo(User::class);
    }

    // relation with response
    public function response(){
        return $this->hasMany(Response::class);
    }
}
