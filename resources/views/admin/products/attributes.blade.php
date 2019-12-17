@extends('admin.master')

@section('content')

  

  <diV class="col-md-6">

    <h1>Attributes</h1>

        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger">
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




         {!! Form::model($prodDet, ['method'=>'post', 'action'=> ['ProductsController@storeattribute', $prodDet->id], 'files'=>true]) !!}


              <input type="hidden" name="product_id" value="{{ $prodDet->id }}">



               <div class="control-group">
                <label class="control-label">Create Attribute</label>

                <div class="controls field_wrapper">
                   
               <input required type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;"  />

               <input required type="text" name="size[]" id="size" placeholder="Size" style="width:120px;" />


               <input required type="text" name="price[]" id="price" placeholder="Price" style="width:120px;" />


               <input required type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;" />

                    
                  
                 
                 </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
              </div>
            {!! Form::close() !!}

             

           <form action="{{ url('admin/editattr/'.$prodDet->id) }}" method="post">{{ csrf_field() }}

             <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($prodDet['attr'] as $attribute)
                  <tr class="">
                    <td class="center"><input type="hidden" name="idFromat[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                    <td class="center">{{ $attribute->sku }}</td>
                    <td class="center">{{ $attribute->size }}</td>
                    <td class="center"><input name="price[]" type="text" value="{{ $attribute->price }}" /></td>
                    <td class="center"><input name="stock[]" type="text" value="{{ $attribute->stock }}" required /></td> 
                    <td class="center">
                      <input type="submit" value="Update" class="btn btn-primary btn-mini" />

                      <br>

                      <br>
                      <a href="{{ url('/admin/delattribute/'.$attribute->id) }}" class="btn btn-danger">Delete</a>
                     
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
             </form>
  </diV>


@endsection
