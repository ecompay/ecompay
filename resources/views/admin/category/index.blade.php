@extends('admin.master')

@section('content')


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

    

      <h2>Section title</h2>
      
      
      <div class="row">
       
       <div class="col-md-6">


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
          <!-- FORM -->
       <form class="form-horizontal" action="{{ route('create-category') }}" method="POST" name="create_category" id="create_category">

        {{ csrf_field() }}
            <!-- TEXT FIELD GROUPS -->
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Enter name">
            </div>

             
             <div class="form-group">
                <label>Category Degree <small class="text-muted"></small></label>
                 <select name="root_id" style="width:220px;">
                    <option value="0">Main Category</option>
                    @foreach($degree as $deg)
                    <option value="{{ $deg->id }}">{{ $deg->name }}</option>
                    @endforeach
                  </select>
             </div>




             <div class="form-group">
                <label for="name">Description</label>
                <input class="form-control" type="text" id="name" name="description" placeholder="Enter name">
            </div>
            <br>


           <div class="form-group">
                <label for="name">URL</label>
                <input class="form-control" type="text" name="url" id="url" name="description" placeholder="Enter URL">
            </div>

            <div class="form-group">
                <label>Enable <small class="text-muted"></small></label>
                <input type="checkbox" name="status" id="status" value="1">
            </div>

               <button type="submit" class="btn btn-primary">Submit</button>
           

           </form>
       </div>


        <div class="col-md-6">


       </div>

      </div>





    </main>




@endsection