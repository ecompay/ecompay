@extends('admin.master')

@section('content')



        
                   
                    <div class="col-md-6">
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
                                <h5 class="card-title m-b-0">Edit Coupon</h5>


                                       <form class="form-horizontal" method="post" action="{{ url('admin/couponeupdate/'.$coupdet->id) }}" name="updatecoupon" id="updatecoupon">{{ csrf_field() }}
                                 




                                <div class="form-group m-t-20">
                                    <label>Coupon Code <small class="text-muted"></small></label>
                                    <input value="{{ $coupdet->code }}" type="text" name="code" id="code" maxlength="15" minlength="5" required class="form-control date-inputmask">
                                </div>

                                
                                <div class="form-group m-t-20">
                                    <label>Volume <small class="text-muted"></small></label>

                                    <div class="controls">
                                    <input value="{{ $coupdet->volume }}" type="number" name="volume" id="volume" min="1"  required class="form-control date-inputmask">

                                    </div>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Volume Type <small class="text-muted"></small></label>
                                     <select name="volume_type" id="volume_type" style="width:220px;">
                                        <option @if($coupdet->volume_type=="Percentage") selected @endif value="Percentage">Percentage</option>
                                        <option @if($coupdet->volume_type=="Fixed") selected @endif value="Fixed">Fixed</option>
                                        
                                      </select>
                                </div>



                                <div class="form-group m-t-20">
                                   


                                   
                                   <label class="control-label">Expiry Date</label>
                                  <div class="controls">
                                 <input value="{{ $coupdet->expdate }}" type="text" name="expdate" id="expdate" required>
                                  </div>
                                </div>
                                 
                                

                                <div class="form-group">
                                    <label>Enable <small class="text-muted"></small></label>
                                    <input type="checkbox" name="status" id="status" value="1" @if($coupdet->status=="1") checked @endif>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                         <input type="submit" value="Edit Coupon" class="btn btn-primary">
                                    </div>
                                </div>

                            </form>


                            </div>
                        </div>
                        <div class="card">
                           
                        </div>
                        <div class="card">
                           
                        </div>
     
               
              


@endsection
