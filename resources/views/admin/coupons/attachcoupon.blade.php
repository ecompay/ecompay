@extends('admin.master')

@section('content')



                <div class="row">
                   
                    <div class="col-md-12">
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
                                <h5 class="card-title m-b-0">Add Coupon</h5>


                                 <form class="form-horizontal" method="post" action="{{ url('admin/storecoupon') }}" name="attachcoupon" id="attachcoupon">{{ csrf_field() }}
                                 




                                <div class="form-group m-t-20">
                                    <label>Coupon Code <small class="text-muted"></small></label>
                                    <input type="text" name="code" id="code" class="form-control date-inputmask">
                                </div>

                                
                                <div class="form-group m-t-20">
                                    <label>Volume <small class="text-muted"></small></label>
                                    <input type="text" name="volume" id="volume" class="form-control date-inputmask">
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Volume Type <small class="text-muted"></small></label>
                                     <select name="volume_type" id="volume_type" style="width:220px;">
                                        <option value="Percentage">Percentage</option>

                                        <option value="Fixed">Fixed</option>
                                        
                                      </select>
                                </div>



                                <div class="form-group m-t-20">
                                    <label>Exp Date <small class="text-muted"></small></label>
                                    <input type="text" name="expdate" id="expdate" class="form-control date-inputmask">


                              

                                </div>
                                 
                                

                                <div class="form-group">
                                    <label>Enable <small class="text-muted"></small></label>
                                    <input type="checkbox" name="status" id="status" value="1">
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                         <input type="submit" value="Add Coupon" class="btn btn-primary">
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
               
              
            </div>





@endsection