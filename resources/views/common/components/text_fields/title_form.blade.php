<div class="form-group ">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title" value="{{old('title')}} @if(isset($blog)) {{$blog->title}} @endif">
</div>
