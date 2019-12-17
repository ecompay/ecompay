@extends('front.master')
@section('content')




<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>

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
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                      

                        <?php $sum_amount = 0; ?>

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

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="card-body">
                 
                        <ul class="user_option code bg-primary">
                            

                            <h4 class="card-title text-warning">Use Coupon Code</h4>
                          
                             <form action="{{ url('cart/usecoupon') }}" method="post">{{ csrf_field() }}
                              <input type="text" name="code">

                              <input type="submit" value="Apply" class="btn btn-warning">

                            </form>



                            <h4 class="card-title text-warning">Use Gift Voucher</h4>



                             <h4 class="card-title text-warning">Estimate Shipping & Taxes</h4>
                            
                        </ul>
                     
                         <div class="form-group">
                           
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                
                         </div>
                           <div class="form-group">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            
                           </div>
                            <div class="form-group">
                                <label>Zip Code:</label>
                                <input type="text">
                            </div>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                   
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body">
                    <div class="total_area">
                        <ul class="code bg-info">
                           
                             <h4 class="card-title text-warning">Cart Sub Total</h4>
                          

                             <h4 class="card-title text-warning">Eco Tax</h4>


                              <h4 class="card-title text-warning">Shipping Cost   Free</h4>
                            
                           
                               
                            @if(!empty(Session::get('couponsum')))

                             <h4 class="card-title text-warning">Total: <?php echo $sum_amount; ?></h4>

                              <h4 class="card-title text-warning">Coupon Discount <?php echo Session::get('couponsum'); ?></h4>
                              
                             <h4 class="card-title text-warning">Grand Total <?php echo $sum_amount - Session::get('couponsum') ?></h4>

                              @else

                                <h4 class="card-title text-warning">Sum Total <?php echo $sum_amount; ?></h4>


                            @endif
                        </ul>
                            <a class="btn btn-warning update" href="">Update</a>



                            <a class="btn btn-primary check_out" href="{{ url('/checkout') }}">Check Out</a>
                    </div>
                </div>
                </div>
            
        </div>
        </div>
    </section><!--/#do_action-->


@endsection