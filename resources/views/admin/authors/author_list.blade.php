@extends('layouts.admin')

@section('content')
    @if(count($authors)>0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Joined At</th>
                    <th scope="col">Blogs</th>
                </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{$author->name}}</td>
                    <td>{{$author->email}}</td>
                    <td>{{date('d M Y ',strtotime($author->created_at))}}</td>
                    <td>
                        <a class="btn btn-secondary" href="/admin/authors/{{$author->id}}/blog" role="button">Blogs</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
@endsection
