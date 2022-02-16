<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['user_id', 'image_id', 'content'];

    public function usuario() {
        return $this->belongsTo('App\User', "user_id");
    }
    
    public function imagen() {
        return $this->belongsTo('App\Image', "image_id");
    }
}
