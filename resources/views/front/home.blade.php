
@extends('front.master')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
         

            <img class="card-img-top" src="{{url('images',$product->image)}}" alt="Card image cap">

            
            <div class="card-body">
              <p class="card-text"><a href="{{ url('product/'.$product->id)}}">$ {{ $product->price }}</a></p>
              <p class="card-text">{{ $product->name }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
           @endforeach
      </div>
    </div>
  </div>



@endsection