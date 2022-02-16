<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = ['user_id', 'image_id'];

    public function usuario() {
        return $this->belongsTo('App\User', "user_id");
    }
    
    public function imagen() {
        return $this->belongsTo('App\Image', "image_id");
    }
}
