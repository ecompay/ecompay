@extends('front.master')
@section('content')

<br>


<br>

<br>


<br>

  <h1>Order Review</h1>


<div class="container">
 

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

                   @if(!empty(Session::get('couponsum')))

                    <h4 class="card-title text-warning">SUM TOTAL: $<?php echo $sum_amount; ?></h4>


                    <h4 class="card-title text-warning">Copon Disount $ <?php echo Session::get('couponsum'); ?></h4>

                    <h4 class="card-title text-warning">Grand Total $ <?php echo $sum_amount - Session::get('couponsum'); ?></h4>


                    @else
                        <h4 class="card-title text-warning">Sum Total $ <?php echo $sum_amount; ?></h4>

                    @endif



    <div class="row">

 <div class="col-md-6">


    <p>Invoice Details</p>



    {{ $clientDetails->name }}

    <br>

     {{ $clientDetails->address }}


     <br>


     {{ $clientDetails->city }}


     <br>

     {{ $clientDetails->state }}


       <br>

      {{ $clientDetails->country }}

       <br>
       

       {{ $clientDetails->pincode }}


        <br>

       {{ $clientDetails->mobile }}



 </div>

  <div class="col-md-6">
          <p>Shipping Details</p>



          {{ $shipdet->name }}


          <br>

         {{ $shipdet->address }}

          <br>


          {{ $shipdet->city }}


          <br>


           {{ $shipdet->state }}


            <br>


            {{ $shipdet->country }}

            <br>

             {{ $shipdet->pincode }} 
            
              <br>

             {{ $shipdet->mobile }}  



             <br>


              <a class="btn btn-primary check_out" href="{{ url('/paypalpayment') }}">Paypal</a>
                           

 </div>
</div>
</div>
















































@endsection