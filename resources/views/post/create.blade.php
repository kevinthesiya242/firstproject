@extends('admin.main')
@section('content')

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1>Create Posts</h1>
        <hr>
        <button class="btn-default"><a href="">View all Posts</a></button>
        <button class="btn-default"><a href="post/create">Create new post</a></button>
        
       <hr>
       @if( Session::has('cc'))
       <div class="alert alert-success">
        <button class="close" data-dismiss="alert">*</button>
        <strong>{{ session('cc') }}</strong> 
       </div>
       @endif
       @if( Session::has('coc'))
       <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">*</button>
        <strong>{{ session('coc') }}</strong>
        <ul>
          @foreach($errors->all() as $error)
          <li>
            {{ $error }}
          </li>
          @endforeach
        </ul>
      </div>
       @endif
       <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{ route('post.store') }}">
          @csrf
  <fieldset>
    <legend>Create Post</legend>
    <div class="form-group">
      <label >Title</label>
      <div>
        <input type="text" class="form-control" value=""  name="title" placeholder="Enter title ">
      </div>
    </div>
    <div class="form-group">
      <label>Author</label>
      <input type="text" class="form-control" name="author" placeholder="Enter author ">
    </div>
    
    <div class="form-group">
      <label for="exampleSelect1">select</label>
      <select class="form-control" name="category_id" id="exampleSelect1">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" >{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">Enter Image</small>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
         
       </div>

@endsection