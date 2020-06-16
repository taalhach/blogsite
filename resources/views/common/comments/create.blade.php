<form action="/author/blog/{{$blog->id}}/comment"  method="post">
    @csrf
    <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Comment" class="btn btn-primary btn-dark">
    </div>
</form>
