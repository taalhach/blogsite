@extends('layouts.author')

@section('content')
            <form action="/author/blog" method="post">
                @csrf
                @include('common.components.text_fields.title_form')
                @include('common.components.text_areas.content_form')
                @include('common.components.buttons.submit_blog')
            </form>
            @include('layouts.errors')
@endsection
