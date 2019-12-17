@extends('front.master')
@section('content')


<br>


<br>


<h1>Checkout</h1>

    

    <?php $sum_amount = 0; ?>
                         <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Code</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                           
                             <td class="total">Total Amount</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($clientCart as $cart)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="width:100px;" src="{{url('images',$cart->image)}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $cart->name }}</a></h4>
                                <p>Code: {{ $cart->code }}</p>
                            </td>
                            <td class="cart_price">
                                <p>$ {{ $cart->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{ url('/updatyquantityofcart/'.$cart->id.'/1') }}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">


                                     @if($cart->quantity>1)
                                    <a class="cart_quantity_down" href="{{ url('/updatyquantityofcart/'.$cart->id.'/-1') }}"> - </a>

                                     @endif

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$ {{ $cart->price*$cart->quantity }}</p>
                            </td>

                            

                              <?php $sum_amount = $sum_amount + ($cart->price*$cart->quantity); ?>

                             

                            <td class="cart_delete">
                                <a class="btn btn-danger cartdelete" href="{{ url('/deleteproductfromcart/'.$cart->id) }}"><i class="fa fa-times"></i>Delete</a>
                            </td>
                        </tr>
                            </tbody>
                </table>
                        @endforeach


<section id="form" style="margin-top:20px;"><!--form-->
        

           
             
                <form action="{{ url('/invoicestore') }}" method="POST">{{ csrf_field() }}
                <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Invoice To</h2>
                        <input id="invoice_name" name="invoice_name" value="{{ $clientDetails->name }}" type="text" placeholder="Invoice Name" />
                            <input id="invoice_address" name="invoice_address" value="{{ $clientDetails->address }}" type="text" placeholder="Invoice Address" />
                            <input id="invoice_city" name="invoice_city" value="{{ $clientDetails->city }}" type="text" placeholder="Invoice City" />
                            <input id="invoice_state" name="invoice_state" value="{{ $clientDetails->state }}" type="text" placeholder="Invoice State" />
                             <select id="invoice_country" name="invoice_country" class="form-control">

                                <option value="">Select Country</option>
                                 @foreach($countries as $country)
                                     <option value="{{ $country->country_name}}" @if($country->country_name == $clientDetails->country) selected @endif>{{ $country->country_name }}</option>

                                 @endforeach

                              </select>

                            <input id="invoice_pincode" name="invoice_pincode" value="{{ $clientDetails->pincode }}" type="text" placeholder="Invoice Pincode" />
                            <input id="invoice_mobile" name="invoice_mobile" value="{{ $clientDetails->mobile }}" type="text" placeholder="Invoice Mobile" />

                            <div class="form-check">



                              


                                <br>

                              


                       


                                   <input type="checkbox" class="form-check-input" id="duplicateaddress" />
                                          <label class="form-check-label" for="invoicetoship">Shipping Address same as Invoice Address</label>
                            </div>

                            </div>
                           
                            
                          
                            
                      
                    </div><!--/login form-->
               
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-3">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Ship To</h2>
                       
                             <input name="shipname"  id="shipname" @if(!empty($shipdet->name)) value="{{ $shipdet->name }}" @endif type="text"placeholder="Shipping Name"  class="form-control"/>

                              <br>
                              <input id="shipaddress" name="shipaddress" @if(!empty($shipdet->address)) value="{{ $shipdet->address }}" @endif 
                              type="text" placeholder="Shipping Address"  class="form-control"/>


                              <br>
                              <input name="shipcity"  id="shipcity" @if(!empty($shipdet->shipcity)) value="{{ $shipdet->shipcity }}" @endif type="text" placeholder="Shipping City"  class="form-control"/>

                              <br>
                              <input name="shipstate" id="shipstate"  @if(!empty($shipdet->shipstate)) value="{{ $shipdet->shipstate }}" @endif type="text" placeholder="Shipping State"  class="form-control"/>

                              <br>
                               <select id="shipcountry" name="shipcountry" class="form-control">

                                <option value="">Select Country</option>
                                 @foreach($countries as $country)
                                    <option value="{{ $country->country_name}}"
                                     @if(!empty($shipdet->shipcountry) && $country->country_name == $shipdet->country) selected @endif
                                      >{{ $country->country_name }}</option>

                                 @endforeach

                              </select>

                              <br>
                              <input name="shippincode" id="shippincode" @if(!empty($shipdet->shippincode)) value="{{ $shipdet->shippincode }}" @endif type="text" placeholder="Shipping Pincode"  class="form-control"/>

                              <br>


                             
                              <input name="shipmobile" id="shipmobile" @if(!empty($shipdet->shippincode)) value="{{ $shipdet->shipmobile }}" @endif type="text" placeholder="Shipping Mobile"  class="form-control"/>
                            <button type="submit" class="btn btn-primary">Checkout</button>

                      
                    </div><!--/sign up form-->
                </div>
            </div>
         </div>
        </form>
       
    </section><!--/form-->



@endsection