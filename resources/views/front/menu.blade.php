<!-- NAVBAR WITH FORM -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">ECOM</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    


                    
                  
                      <li class="nav-item">

                    
                      

                       <a class="nav-link" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i>Cart ({{ $cartCount}})</a>

                     </li>

                      @if(empty(Auth::check()))

                    <li class="nav-item">

                      <a class="nav-link" href="{{ url('/loginuser') }}"><i class="fa fa-lock"></i> Login</a>

                    </li>


                    @else

                      <li class="nav-item">

                        <a class="nav-link" href="{{ url('/clientaccount') }}"><i class="fa fa-user"></i> Account</a>


                      </li>

                       <li class="nav-item">

                        <a class="nav-link" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>

                      </li>

                    @endif


                </ul>


              <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                  </button>
                  <div class="dropdown-menu">
                   @foreach($categories as $cat)

                 
                  <a class="dropdown-item" href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a>
                  

                     @foreach($cat->cat as $subc)

                      @if($subc->status=="1")
                     <a class="dropdown-item" href="{{ asset('products/'.$cat->url) }}">--{{ $subc->name }}</a>
                     
                      @endif
   
                     @endforeach
                   
                     @endforeach

               </div>


                <form class="form-inline ml-auto">
                    <input type="text" class="form-control mr-2" placeholder="Search">
                    <button class="btn btn-outline-success">Search</button>
                </form>
            </div>
        </div>
    </nav>
