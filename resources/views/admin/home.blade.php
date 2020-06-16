@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($blogs as $blog)
                        <li class="list-group-item">
                            @if(!$blog->status)
                                <form action="/admin/blog/{{$blog->id}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-secondary">Publish</button>
                                    <a class="card-link" href="/admin/authors/blog/{{$blog->id}}">{{$blog->title}}</a>
                                </form>
                            @else
                                <div>
                                    <button type="button" class="btn btn-success" disabled>Publish</button>
                                    <a class="card-link" href="/admin/authors/blog/{{$blog->id}}">{{$blog->title}}</a>
                                </div>
                                <div class="row" >
                                    @include('common.like.like-disabled')
                                    <strong>{{count($blog->likes)}}</strong>

                                        <a class="btn" href="/admin/authors/blog/{{$blog->id}}" role="button">
                                            <img src="https://img.icons8.com/material-outlined/30/000000/comments.png"/>
                                        </a>
                                    <strong>{{count($blog->comments)}}</strong>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
