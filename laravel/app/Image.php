<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    protected $fillable = ['user_id', 'image_path', 'description'];

    public function usuario() {
        return $this->belongsTo('App\User', "user_id");
    }
    public function comentarios() {
        return $this->hasMany('App\Comment', 'image_id');
    }

    public function like() {
        return $this->hasMany('App\Like', 'image_id');
    }

}
