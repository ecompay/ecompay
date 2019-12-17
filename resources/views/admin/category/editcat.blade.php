@extends('admin.master')

@section('content')



    <div class="col-md-6">


        <h1>Edit Category</h1>
                        <div class="card">
                            <div class="card-body">

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
                                <h5 class="card-title m-b-0">Edit category</h5>


                                 <form class="form-horizontal" method="post" action="{{ url('admin/updatecat/'.$catdetails->id) }}" >{{ csrf_field() }}



                                <div class="form-group m-t-20">
                                    <label>Category Name <small class="text-muted"></small></label>
                                    <input type="text" name="name" class="form-control date-inputmask" id="name" value="{{ $catdetails->name }}" placeholder="Category Name">
                                </div>



                                  <div class="form-group">
                                    <label>Category Degree <small class="text-muted"></small></label>
                                   <select name="root_id" style="width:220px;">
                                        <option value="0">Main Category</option>
                                        @foreach($degree as $deg)
                                        <option value="{{ $deg->id }}" @if($deg->id == $catdetails->root_id) selected @endif>{{ $deg->name }}</option>
                                        @endforeach
                                      </select>
                                </div>







                                <div class="form-group">
                                    <label>Description<small class="text-muted"></small></label>
                                   <textarea name="description">{{ $catdetails->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>URL <small class="text-muted"></small></label>
                                    <input type="text" name="url" class="form-control international-inputmask" id="url" value="{{ $catdetails->url }}" placeholder="International Phone Number">
                                </div>


                                 <div class="form-group">
                                    <label>Enable <small class="text-muted"></small></label>
                                    <input type="checkbox" name="status" id="status"
                                     @if($catdetails->status=="1") checked @endif value="1">
                                
                                </div>

                                

                                <div class="border-top">
                                    <div class="card-body">
                                         <input type="submit" value="Edit Category" class="btn btn-primary">
                                    </div>
                                </div>

                            </form>


                            </div>
                        </div>
                        <div class="card">
                           
                        </div>
                        <div class="card">
                           
                        </div>
                    </div>
                </div>









@endsection