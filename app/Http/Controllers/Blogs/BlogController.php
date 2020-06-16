<?php

namespace App\Http\Controllers\Blogs;

use App\Blog;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.write');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blog $blog)
    {
        $validated=request()->validate([
            'title'=>['required','min:5'],
            'content'=>['required']
        ]);
        $validated['user_id']=auth()->id();
        Blog::create($validated);
        return redirect(route('author.diary'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('author.blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        if(Gate::authorize('update',$blog)){
            return view("author.edit",compact('blog'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        if (Gate::authorize('update',$blog)){
            $validated=$request->validate(['title'=>'required|min:5','content'=>'required']);
            $blog->title=$validated['title'];
            $blog->content=$validated['content'];
            $blog->save();
            return redirect('/author/blog/'.$blog->id);
        }
    }

}
