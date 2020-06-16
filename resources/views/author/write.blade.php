@extends('layouts.author')

@section('content')
            <form action="/author/blog" method="post">
                @csrf
                <div class="form-group ">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="20">{{old('title')}}</textarea>
                </div>
                <input type="submit" value="Submit Blog" class="btn btn-primary btn-dark">
            </form>
            @include('layouts.errors')
@endsection
