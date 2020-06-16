<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Favourites;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::orderBy('date','desc')->get();
        $title='Blogs';
        return view('admin.home',compact('blogs','title'));

    }

    public function approvals(){
            $blogs=Blog::where('status',false)->orderBy('date','desc')->get();
            $title='Approvals';
            return view('admin.home',compact('blogs','title'));
    }
    public function authors(){
            $authors=User::where('is_admin',false)->get();
            $title='Approvals';
            return view('admin.authors.author_list',compact('authors','title'));
    }
    public function author_blogs(User $user){
        $blogs=$user->blogs;
        $title="Author's Blogs";
        return view('admin.home',compact('blogs','title'));
    }
    public function blog(Blog $blog){
        return view('admin.blog',compact('blog'));
    }

    public function favourites(){
        $favourites=Blog::all();
        $blogs=[];
        $title="Favourites";
        foreach ($favourites as $f){
            if (count($f->favourites)>0){
                array_push($blogs,$f);
            }
        }
        return view('admin.home',compact('blogs','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
