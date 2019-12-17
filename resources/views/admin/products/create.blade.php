@extends('admin.master')

@section('content')


<br>

<br>


<br>

<br>




<div class="col-md-6">
    <h1>Create Products</h1>

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


      {!! Form::open(['method' => 'POST', 'action' => 'ProductsController@storeproduct', 'files' => true]) !!}





        <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">
                  <select name="category_id" id="category_id" style="width:220px;">
                    <?php echo $cat_dropd; ?>
                  </select>
                </div>
              </div>
            


           <div class="form-group">
                {{ Form::label('Name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'2')) }}
            </div>
             
             

             <div class="form-group">
                {{ Form::label('code', 'code') }}
                {{ Form::text('code', null, array('class' => 'form-control')) }}
            </div>




              <div class="form-group">
                {{ Form::label('color', 'color') }}
                {{ Form::text('color', null, array('class' => 'form-control')) }}
              </div>


            <div class="form-group">
                {{ Form::label('Description', 'Description') }}
                {{ Form::text('description', null, array('class' => 'form-control')) }}
            </div>


             
            <div class="form-group">
                {{ Form::label('Care', 'Care') }}
                {{ Form::text('care', null, array('class' => 'form-control')) }}
            </div>


               <div class="form-group">
                {{ Form::label('Price', 'Price') }}
                {{ Form::text('price', null, array('class' => 'form-control')) }}
               </div>

             <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}
            </div>
              
              
            <div class="form-group">
                <label>Enable <small class="text-muted"></small></label>
                <input type="checkbox" name="status" id="status" value="1">
            </div>


            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

         {{!! Form::close() !!}}
</div>


@endsection
