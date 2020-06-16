<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    public $timestamps = false;
    protected $fillable=['blog_id','user_id'];

}
