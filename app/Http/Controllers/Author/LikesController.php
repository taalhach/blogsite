<?php

namespace App\Http\Controllers\Author;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
        public function store(Blog $blog)
        {
            $count = $blog->likes()
                ->where([
                    ['blog_id', '=', $blog->id],
                    ['user_id', '=', auth()->id()],
                ])->count();
//            dd($count);
            if ($count > 0) {
                Like::where([['blog_id', $blog->id], ['user_id', auth()->id()]])->delete();
            } else {
                Like::create(
                    [
                        'user_id' => auth()->id(),
                        'blog_id' => $blog->id
                    ]
                );
            }
            return back();
        }
}
