<form action="/author/favourites/{{$blog->id}}/like"  method="post">
    @csrf
    <button type="submit" class="btn">
        @if(count($blog->isLiked)>0)
            <img src="https://img.icons8.com/ios-filled/30/000000/facebook-like.png"/>
        @else
            <img  src="https://img.icons8.com/ios/30/000000/facebook-like.png"/>
        @endif
    </button>
</form>
