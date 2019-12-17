<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('dist/css/font-awesome.min.css')}}" rel="stylesheet">
</head>

<body>


@include('front.menu')

  





</header>

<main role="main">

 

   @yield('content')

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
   
  </div>
</footer>

     <script src="{{asset('dist/js/jquery.js')}}"></script>
      <script src="{{asset('dist/js/bootstrap.min.js')}}"></script> 
      <script src="{{asset('dist/js/popper.min.js')}}"></script>
      <script src="{{asset('dist/js/front.js')}}"></script>


<script>

  $(document).ready(function(){

     $("#invoicetoship").on('click',function(){
         if(this.checked){
            alert("test");
         }
     });

  });
   </script>


  <script>
   $(document).ready(function(){

     $("#duplicateaddress").on('click',function(){
         if(this.checked){
            $("#shipname").val($("#invoice_name").val());
            $("#shipaddress").val($("#invoice_address").val());
            $("#shipcity").val($("#invoice_city").val());
            $("#shipstate").val($("#invoice_state").val());
            $("#shipcountry").val($("#invoice_country").val());
            $("#shippincode").val($("#invoice_pincode").val());
            $("#shipmobile").val($("#invoice_mobile").val());
         }else{
            $("#shipname").val('');
            $("#shipaddress").val('');
            $("#shipcity").val('');
            $("#shipstate").val('');
            $("#shipcountry").val('');
            $("#shippincode").val('');
            $("#shipmobile").val('');
         }
     });
 });
 </script>
</body>
</html>



































