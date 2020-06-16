@php
    $blogs=auth()->user()->favourites;
    $title='My Favourites';
@endphp

@include('author.home')
