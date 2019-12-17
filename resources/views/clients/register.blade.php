@extends('front.master')
@section('content')


    <section id="form"><!--form-->
        <div class="container">

             @if(Session::has('flash_message_error'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{!! session('flash_message_error') !!}</strong>
                                </div>
                                @endif   
                                @if(Session::has('flash_message_success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{!! session('flash_message_success') !!}</strong>
                                    </div>
                                @endif
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                     


                    
            <div class="card bg-primary text-center card-form">
              <div class="card-body">
                    
                        <h2 class="text-warning">Login to your account</h2>


                        <form id="clientForm" name="clientForm" action="{{ url('/clientlogin')}} " method="POST">{{ csrf_field() }}
                            <input id="email" name="email" type="email" placeholder="Email", class="form-control" />

                            <br>
                            <input id="password" name="password" type="password" placeholder="Password", class="form-control" />

                            <br>
                            <span>
                                <input type="checkbox" class="checkbox"> 
                                Keep me signed in
                            </span>

                            <br>
                            <button type="submit" class="btn btn-dark">Login</button>
                        </form>

                   

                </div>
            </div>

       

                    <?php if (Auth::check()) { ?>
                    <li class="dropdown-item"><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                
                <?php } ?>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-primary text-center card-form">
              <div class="card-body">
                    <div class="signup-form"><!--sign up form-->
                        <h2 class="text-warning">New User Signup!</h2>
                       <form id="registerClient" name="registerForm" action="{{  url('/loginstore')}}" method="POST">

                            {{ csrf_field()}}
                            <input id="name" name="name" type="text" placeholder="Name", class="form-control"/>

                            <br>
                            <input id="email" name="email" type="email" placeholder="Email Address", class="form-control"/>

                            <br>
                            <input id="password" name="password" type="password" placeholder="Password", class="form-control"/>

                            <br>
                            <button type="submit" class="btn btn-dark">Signup</button>
                        </form>    
                       </div>
                   </div>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->




@endsection
