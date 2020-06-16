<form action="/author/favourites/{{$blog->id}}"  method="post">
    @csrf

    <button type="submit" class="btn">
    @if(count($blog->isFavourite)>0)
            <img  src="https://img.icons8.com/ios-filled/30/000000/favorites.png"/>
        @else
            <img src="https://img.icons8.com/ios/30/000000/favorites.png"/>
        @endif
    </button>
</form>
