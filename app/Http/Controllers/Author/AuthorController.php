<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Blog;
use App\Favourites;

class AuthorController extends Controller
{
    public function index()
    {
        $blogs=Blog::where('status',true)->orderBy('date','desc')->get();
        $title='Blogs';
        return view('author.home',compact('blogs','title'));
    }

    function diary(){
        $blogs=auth()->user()->blogs;
        $title='My Diary';
        return view('author.home',compact('blogs','title'));
    }
    public function favourites(){
        return view('author.favourites');
    }

}
