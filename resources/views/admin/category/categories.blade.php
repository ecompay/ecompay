@extends('admin.master')

@section('content')







   <div class="col-md-6"> 
    <h1>All Categories</h1>
    <table class="table">
            <thead>
                <tr>
                   
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Level</th>
                    <th>Category URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                <tr>
                    
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->root_id }}</td>
                    <td>{{ $category->url }}</td>
                    <td class="center">
                    
             

                      <a href="{{ url('admin/editcat/'.$category->id) }}" class="btn btn-primary btn-mini">Edit</a>

                       <a href="{{ url('/admin/deletecat/'.$category->id) }}" class="btn btn-danger btn-mini deleteRecord">Delete</a>

                    
                   
                   


                   


                </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>

</div>
   

@endsection
