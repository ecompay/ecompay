@extends('admin.master')

@section('content')

   



        <div class="col-md-6">

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



      

        <h1>View Coupons</h1>
<!-- TABLE -->
        <table class="table">
            <thead>
                <tr>
                    <th>Coupon ID</th>
                    <th>Coupon Code</th>
                    <th>Amount</th>
                    <th>Amount Type</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($coupons as $coupon)
                <tr>
                    
                    <td>{{ $coupon->id }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->volume }}</td>
                    <td>

                        <?php if($coupon->volume_type=="Percentage") { ?>

                        %

                        <?php } else { ?>

                         $ 
                        
                        <?php } ?>


                    </td>

                    <td>{{ $coupon->expdate }}</td>
                    <td>@if($coupon->status==1) Active @else Not Active @endif</td>
                    <td>{{ $coupon->created_at }}</td>
                   

                
                    <td class="center">
                    
                    <a href="{{ url('/admin/couponedit/'.$coupon->id) }}" class="btn btn-primary" title="Edit Coupon">Edit</a>
                    
                   <a href="{{ url('/admin/coupdel/'.$coupon->id) }}" class="btn btn-danger">Delete</a>
                   

                     
                </td>
                   







                </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>


</div>







@endsection
