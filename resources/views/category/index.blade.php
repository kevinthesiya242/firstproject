@extends('admin.main')
@section('content')

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1>Category</h1>
        <hr>
        <button class="btn-default"><a href="category/show">View all Category</a></button>
        <button class="btn-default"><a href="category/create">Create new Category</a></button>
        <hr>

@endsection