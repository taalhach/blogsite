<?php

namespace App\Http\Controllers\Blogs;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $blog->addComment(request()->validate(['content'=>'required']));
        return back();
    }
}
