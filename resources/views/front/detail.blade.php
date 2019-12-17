@extends('front.master')
@section('content')


<br>


<br>
<br>


<br>

<div class="row">

     <div class="col-md-6">
        <div class="container">
          <h1>Product Details</h1>




 <div class="card mb-4 shadow-sm">
  <img src="{{url('images',$prodet->image)}}"  class="card-img" style="width:300px" alt="" />
  </div>


    <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 


                  @foreach($proImages as $image)

                  <div class="card mb-4 shadow-sm">
                 <img src="{{url('images',$image->image)}}"  class="card-img" style="width:100px" alt="" />

               </div>


               @endforeach



                </div>
               
              </div>


</div>
     </div>



      <div class="col-md-6">



        <div class="container">


  <div class="card mb-4 shadow-sm">

  <div class="card-body">

              
                            <form name="tocart" id="tocart" action="{{ url('tocart')}}" method="post">{{ csrf_field() }}

                                <input type="hidden" name="product_id" value="{{ $prodet->id }}">

                                <input type="hidden" name="name" value="{{ $prodet->name }}">


                                <input type="hidden" name="code" value="{{ $prodet->code }}">


                                <input type="hidden" name="color" value="{{ $prodet->color }}">


                                <input type="hidden" name="price" id="price" value="{{ $prodet->price }}">

                                <input type="hidden" name="size" id="size" value="{{ $prodet->size }}">

              <p class="card-text">{{ $prodet->name }}</p>

              <p class="card-text">Code: {{ $prodet->code }}</p>


              

                <span id="proPrice"> ${{ $prodet->price }}</span>
                <label>Quantity:</label>
                <input name="quantity" type="text" value="1" />

              

              <select id="chSize" name="size" style="width:350px">
                  <option value="">Select Size</option>
                  @foreach($prodet->attr as $sizes)
                  <option value="{{ $prodet->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>

                  @endforeach
              </select>                                
            


              <p class="card-text">{{ $prodet->description }}</p>


               <p class="card-text">Care: {{ $prodet->care }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 @if($totstock>0)
                <button type="submit" class="btn btn-primary cart" id="shopbut">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>

                @endif
                 <button>
                <p><b>Availability:</b><span id="purchasable"> @if($totstock>0) In Stock @else Out of Stock</p>
                 </button>
                 @endif
              
                </div>
               </form>     
              </div>
            </div>
  </div>
    </div>


     </div>
  
</div>



@endsection
