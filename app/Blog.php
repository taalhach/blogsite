<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    public $timestamps = false;
    protected $fillable=['title','content','user_id'];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return  $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    public function likes(){
        return ($this->hasMany(Like::class,'blog_id'));
    }
    public function favourites(){
        return ($this->hasMany(Favourites::class,'blog_id'));
    }
    public function allFavourites(){
        Blog::hasMany(Favourites::class);
}

    public function addComment($comment){
        return $this->comments()->create($comment);
    }
    public function isFavourite(){
        return ($this
            ->favourites()
            ->where([
                ['blog_id', '=', $this->id],
                ['user_id', '=', auth()->id()],
            ]));
    }
    public function isLiked(){
        return $this
            ->likes()
            ->where([
                    ['blog_id', '=', $this->id],
                    ['user_id', '=', auth()->id()],
                ]);
    }
    public function likeCount(){
        return ($this
            ->likes()
            ->where('blog_id','=',$this->id));
    }

}
