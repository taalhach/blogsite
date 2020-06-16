@extends('layouts.author')

@section('content')
<div class="col-md-8 ">
    <div class="row">
            <h2 >{{$blog->title}}</h2>
    </div>
    <div class="row">
            <p class="text-secondary">{{date('d M Y ',strtotime($blog->date))}}</p>
            <p class="text-reset">&nbsp;By <a href="#">{{ucwords($blog->author->name)}}</a></p>
    </div>
    @can('update',$blog)
    <div class="row">
        <a href="/author/blog/{{$blog->id}}/edit">Edit Blog</a>
    </div>
    @endcan
    <div class="row">
        <p>{{$blog->content}} </p>
    </div>
</div>
<hr class="style-12">
<div class="row" >
        @include('common.like.like-btn')
        <strong>{{count($blog->likes)}}</strong>
    <div class="col-1">
        @include('common.favourites.favourite-btn')
    </div>
</div>
@if($blog->status)
    @include('common.comments.create')
    @include('common.comments.list')
@endif


@endsection
