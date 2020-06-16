@extends('layouts.admin')

@section('content')
    <div class="col-md-8 ">
        <div class="row">
            <h2 >{{$blog->title}}</h2>
        </div>
        <div class="row">
            <p class="text-secondary">{{date('d M Y ',strtotime($blog->date))}}</p>
            <p class="text-reset">&nbsp;By <a href="#">{{ucwords($blog->author->name)}}</a></p>
        </div>
        <div class="row">
            <p>{{$blog->content}} </p>
        </div>
    </div>
    <hr class="style-12">
    <div class="row" >
            @include('common.like.like-disabled')
        <strong>{{count($blog->likes)}}</strong>

    </div>
    @if($blog->status)
        @include('common.comments.list')
    @endif


@endsection
