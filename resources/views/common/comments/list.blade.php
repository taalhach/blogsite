
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Comments</div>
            <ul class="list-group list-group-flush">
                @foreach($blog->comments as $comment)
                <li class="list-group-item">
                    {{$comment->content}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>



