@extends('admin.main')
@section('content')

        <!-- Page Content -->
        <h1>Category</h1>
        <hr>
        <button class="btn-default"><a href="category/show">View all Category</a></button>
        <button class="btn-default"><a href="category/create">Create new Category</a></button>
        
       <hr>
       @if( Session::has('cc'))
       <div class="alert alert-success">
        <button class="close" data-dismiss="alert">*</button>
        <strong>{{ session('cc') }}</strong> 
       </div>
       @endif
      @if( Session::has('dc'))
       <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">*</button>
        <strong>{{ session('dc') }}</strong> 
       </div>
       @endif 
       <hr>
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
      <hr>
       @endif
       <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Id

      </th>
      <th class="th-sm">Created Time

      </th>
      <th class="th-sm">Updated Time

      </th>
      <th class="th-sm">Edit

      </th>
      <th class="th-sm">Delete

      </th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories->all() as $category)
    <tr>
      <td>{{ $category->name }}</td>
      <td>{{ $category->id }}</td>
      <td>{{ $category->created_at }}</td>
      <td>{{ $category->updated_at }}</td>
      <td><a href="{{ route('category.edit',$category->id) }}">Edit</a></td>

      <form method="post" action="{{ route('category.destroy',$category->id) }}">
      @method('DELETE')
         @csrf 
      <td><input type="submit" name="" value="Delete"></td>
      </form>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Id
      </th>
      <th>Created Time
      </th>
      <th>Updated Time
      </th>
      <th>Edit
      </th>
      <th>Delete
      </th>
    </tr>
  </tfoot>
</table>

@endsection