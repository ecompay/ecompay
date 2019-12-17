<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{asset('dist/css/jquery-ui.css')}}" rel="stylesheet">
  </head>





<div class="container-fluid">
  <div class="row">
   
    @include('admin.navbar')

    @yield('content')
   
  </div>
</div>
   <script src="{{asset('dist/js/jquery-1.10.2.js')}}"></script>

   <script src="{{asset('dist/js/jquery-ui.js')}}"></script>


  <script type="text/javascript">
  $(function() {
    $( "#expdate" ).datepicker({
      minDate: 0,
      dateFormat: 'yy-mm-dd'
    });
  });
  </script>
 </body>
</html>