@extends('admin.master')

@section('content')

<div class="col-md-6">

<h1>All Products</h1>





 @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif

        <h1>View Products</h1>
<!-- TABLE -->
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Code</th>
                    <th>Product Color</th>
                    <th>Product Description</th>
                    <th>Product Care</th>
                    <th>Product Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                <tr>
                    
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->name }}</td>

                    <td> <img src="{{url('images',$product->image)}}" style="width:50px;"> </td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->care }}</td>
                    <td>{{ $product->price }}</td>
                    <td class="center">
                    
                    <a href="{{ url('/admin/productedit/'.$product->id) }}" class="btn btn-primary btn-mini">Edit</a>

                    <br>

                    <br>
                   
                    <a href="{{ url('/admin/deletepro/'.$product->id) }}" class="btn btn-danger">Delete</a>

                    <br>

                    <br>

                    <a href="{{route('attributes',$product->id)}}" class="btn btn-sm btn-info" style="margin:5px">Add Attributes</a>


                    <br>

                    <br>


                    <a href="{{ url('/admin/deleteprodimg/'.$product->id) }}" class="btn btn-primary">Delete Image</a>


                    <br>

                    <br>

                    <a href="{{ url('/admin/addmoreimages/'.$product->id) }}" class="btn btn-info">
                      Add Image
                    </a>

                </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>


</div>


@endsection