<?php

namespace App\Http\Controllers\Blogs;

use App\Blog;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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
    public function update(Blog $blog)
    {
        $blog->status=true;
        $blog->save();
        return back();
    }

}
