<?php

namespace App\Http\Controllers\Blogs;

use App\Blog;
use App\Favourites;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    public function store(Blog $blog){

        $count=$blog->favourites()
            ->where([
                ['blog_id', '=', $blog->id],
                ['user_id', '=', auth()->id()],
            ])->count();
        if ($count>0){
            Favourites::where([['blog_id',$blog->id],['user_id',auth()->id()]])->delete();
        }else{
            Favourites::create(
                [
                    'user_id'=>auth()->id(),
                    'blog_id'=>$blog->id
                ]
            );
        }
        return back();
    }
}
