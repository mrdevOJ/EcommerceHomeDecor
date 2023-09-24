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
    padding-top: 40px;
  }
  .input_color{
    color: black
  }
  .descrip{
    font-size: 1px;
    height: 15px;
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
  <div class="content-wrapper ">
    @if(session()->has('msg'))
    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      {{session()->get('msg')}}
    </div>
    @endif
    <div class="row ">
          </div class="div_center">
          <h2 class="text-center">All Product</h2>


<table class="table mt-3 text-center text-secondary table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Title</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Price Discount</th>
      <th scope="col">Price Product</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
@foreach($product as $product)
    <tr >
      <th scope="row w-25">{{$product->id}}</th>
      <td>{{$product->title}}</td>
      <td class="text-wrap descrip w-25">{{$product->description}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->category}}</td>
      <td>{{$product->discount_price}}</td>
      <td>{{$product->price}}</td>
      <td class="w-50"><img src="/product/{{$product->image}}" class="w-100 h-100"></td>
      <td><a class="btn btn-warning" href="{{url('edit_product',$product->id)}}">Edit</a></td>
      <td><a class="btn btn-danger" onclick="return confirm('are you sure ')" href="{{url('delete_product',$product->id)}}">Delete</a></td>
    </tr>
    @endforeach
    
    
  </tbody>
</table>
    </div>

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