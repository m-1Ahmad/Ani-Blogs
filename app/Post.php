<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table Name
    protected $table = 'posts';
    protected $fillable=['title','body','user_id','cover_image'];
    //primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }

}