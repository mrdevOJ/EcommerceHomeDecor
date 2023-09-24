{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Home Admin</title>
    @include('admin.css')
<style>
  .div_center{
    text-align: center;
    padding-top: 40px
  }
  .input_color{
    color: black
  }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
  <div class="content-wrapper text-center">
    @if(session()->has('msg'))
    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      {{session()->get('msg')}}
    </div>
    @endif
    <div class="row ">

          </div class="div_center">
          <h2>Add Category</h2>
<form action="{{url('/add_category')}}" method="post">
  @csrf
  <input type="text" class="input_color" name="category_name" placeholder="Write category name">
  <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
</form>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Category name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $data)

    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->category_name}}</td>
      <td><a onclick="return confirm('Are you Sure about delete this category')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td>
    </tr>
    @endforeach
    
  </tbody>
</table>
    </div>

   

        </div>


          </div>

        </div>

        </div>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        <!-- main-panel ends -->
     
      <!-- page-body-wrapper ends -->
   
  @include('admin.js')
  </body>
</html>