<div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="20">{{old('content')}} @if(isset($blog)) {{$blog->content}} @endif </textarea>
</div>
