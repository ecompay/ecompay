@extends('front.master')
@section('content')


<br>

<br>

<br>

<br>


<section id="form"><!--form-->
        <div class="container">
            <h1>Clients Account</h1>

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
            <div class="row">



                



                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Update Account</h2>


                         <form id="registerClient" name="registerClient" action="{{  url('/clientupdate')}}" method="POST">

                            {{ csrf_field()}}
                             <input value="{{ $clientDetails->name }}" id="name" name="name" type="text" placeholder="Name"/>
                            <input value="{{ $clientDetails->address }}" id="address" name="address" type="text" placeholder="Address"/>
                            <input value="{{ $clientDetails->city }}" id="city" name="city" type="text" placeholder="City"/>
                            <input value="{{ $clientDetails->state }}" id="state" name="state" type="text" placeholder="State"/>
                             <select id="country" name="country">

                                <option value="">Select Country</option>
                                 @foreach($countries as $country)
                                     <option value="{{ $country->country_name}}" @if($country->country_name == $clientDetails->country) selected @endif>{{ $country->country_name }}</option>

                                 @endforeach

                            </select>


                            <input style="margin-top: 10px;" value="{{ $clientDetails->pincode }}" id="pincode" name="pincode" type="text" placeholder="Pincode"/>

                            <input value="{{ $clientDetails->mobile }}" id="mobile" name="mobile" type="text" placeholder="Mobile"/>
                             

                             <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>    
                        
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Update Password</h2>

                        
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->






  



@endsection
