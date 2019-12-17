@extends('admin.master')

@section('content')


<br>

<br>


<br>

<br>





<div class="col-md-6">
   <h1>Edit Products</h1>

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

    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/updatepro/'.$prodetails->id) }}">


        {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Sub Category</label>
                <div class="controls">
                  <select name="category_id" id="category_id" style="width:220px;">
                    <?php echo $cat_dropd; ?>
                  </select>
                </div>
              </div>
            
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $prodetails->name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <input type="text" name="code" id="code"  value="{{ $prodetails->code }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Color</label>
                <div class="controls">
                  <input type="text" name="color" id="color" value="{{ $prodetails->color }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <input type="text" name="description" value="{{ $prodetails->description }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Material & Care</label>
                <div class="controls">

                    <input type="text" name="care" id="care" value="{{ $prodetails->care }}">
                 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{ $prodetails->price }}">
                </div>
              </div>
             
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>

             
            </form>

    

</div>


@endsection