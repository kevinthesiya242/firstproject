@extends('admin.main')
@section('content')

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1>Posts</h1>
        <hr>
        <button class="btn-default"><a href="post/show">View all Posts</a></button>
        <button class="btn-default"><a href="post/create">Create new post</a></button>
        
       <hr>

@endsection