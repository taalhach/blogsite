@extends('layouts.author')

@section('content')
            <form action="/author/blog/{{$blog->id}}" method="POST" >
                @csrf
                @method('PATCH')
                @include('common.components.text_fields.title_form')
                @include('common.components.text_areas.content_form')
                @include('common.components.buttons.update_blog')
            </form>
            @include('layouts.errors')
@endsection


