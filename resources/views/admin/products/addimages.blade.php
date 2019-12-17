@extends('admin.master')

@section('content')


                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    
                    <div class="col-md-6">
             
                            <div class="card-body">

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
                                <h5 class="card-title m-b-0">Add product Images</h5>


       {!! Form::model($prodet, ['method'=>'post', 'action'=> ['ProductsController@storemoreimages', $prodet->id], 'files'=>true]) !!}

        <input type="hidden" name="product_id" value="{{ $prodet->id }}">
             
            
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label">{{ $prodet->product_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label">{{ $prodet->product_code }}</label>
              </div>
             

               <div class="form-group">
               {{ Form::label('image','Image')}}
               {{ Form::file('image',array('class' => 'form-control')) }}


               </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Images" class="btn btn-success">
              </div>
            {!! Form::close() !!}

                 
               <h5>View Images</h5>

               <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Image ID</th>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Delete Image</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($showImages as $image)
                  <tr class="">
                    <td class="center">{{ $image->id }}</td>
                    <td class="center">{{ $image->product_id }}</td>
                    <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$image->image)}}" width="50px" alt="Card image cap"></td>
                    
                    <td>
                    
                    <a href="{{ url('/admin/deladdimage/'.$image->id) }}" class="btn btn-danger">Delete Img</a>

                    

                    </td>     

                  </tr>
                  @endforeach
                </tbody>
              </table>



            <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attr ID</th>
                    <th>Attr SKU</th>
                    <th>Attr Size</th>
                    <th>Attr Price</th>
                    <th>Attr Stock</th>
                     <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($prodet['attr'] as $attribute)
                  <tr class="gradeX">
                    <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                    <td class="center">{{ $attribute->sku }}</td>
                    <td class="center">{{ $attribute->size }}</td>
                    <td class="center">{{ $attribute->price }}</td>
                    <td class="center">{{ $attribute->stock }}</td>
                   
                     <td>
                      <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>


            

                            </div>
                   
                    </div>
                </div>
               

@endsection
