<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function posts(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
