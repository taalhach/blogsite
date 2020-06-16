@extends('layouts.author')

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
                        <a class="card-link" href="/author/blog/{{$blog->id}}">{{$blog->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
