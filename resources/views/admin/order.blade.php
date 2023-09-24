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
  table{
    width: 100%;
    border: 1px solid black;
    border-collapse: collapse;

  }
  th{
    color: #8f5fe8;
    font-size: 1 px;
  }
  </style>  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</head>
  <body>
    <div class="container-scroller ">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class=" page-body-wrapper ">
        <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel ">
  <div class="content-wrapper">

    @if(session()->has('msg'))
    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      {{session()->get('msg')}}
    </div>
    @endif

          <h2 class="text-center "> <nav class="navbar navbar-dark text-light flex-d w-50">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">All Orders</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Find Order</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  
                 
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item ">
                      <a class="nav-link " href="#" role="button"  aria-expanded="false">
                        Delivery status
                      </a>
                      
                        <form class="d-flex mt-3" action="{{url('search')}}" method="get" > @csrf
                       <select name="delivery" class="form-select bg-dark text-light m-1" id="">
                        <option selected value="">Choose a delivery status</option>
                        <option value="delivered">delivered</option>
                        <option value="processing">processing</option>
                       </select>
                       
                        
                      
                    </li> <div class="input-group mb-3 m-1">
                    <input class="form-control" type="text" name="name" placeholder="Search by name">
                    <button class="btn" style="background-color: #8f5fe8" type="submit">Search</button>
                  </div>  </form>
                  </ul>
                
                </div>
              </div>
            </div>
          </nav></h2>
         
<table  class="mt-3 text-center text-secondary tab w-100">
  <thead class="border-bottom ">
    <tr >
      <th scope="col">Id</th>
      <th  scope="col">Name</th>
      <th  scope="col">Email</th>
      <th  scope="col">Phone</th>
      <th  scope="col">Address</th>
      <th  scope="col">Product Title</th>
      <th  scope="col">Quantity</th>
      <th  scope="col">Price</th>
      <th  scope="col">Payment Status</th>
      <th  scope="col">Delivery status</th>
      <th  scope="col">Image</th>
      <th  scope="col">Delete</th>
      <th  scope="col">Delivred</th>
      <th  scope="col">Print PDF</th>

    </tr>
  </thead>
  <tbody class="text-light ">
@foreach($order as $order)
    <tr class="border-bottom">
      <td scope="row">{{$order->id}}</th>
      <td class="w-25">{{$order->name}}</td>
      <td class="text-wrap">{{$order->email}}</td>
      <td class=" ">{{$order->phone}}</td>
      <td class="">{{$order->address}}</td>
      <td class="" >{{$order->product_title}}</td>
      <td class=" ">{{$order->quantity}}</td>
      <td class=" ">{{$order->price}}</td>
      <td class=" ">{{$order->payment_status}}</td>
      <td class=" ">{{$order->delivery_status}}</td>
      <td class=""><img src="/product/{{$order->image}}" class="w-100 h-100"></td>
      <td><a class="btn btn-danger" onclick="return confirm('are you sure ')" href="{{url('delete_order',$order->id)}}">Delete</a></td>

      @if($order->delivery_status=='processing')
      <td><a href="{{url('order_delivery',$order->id)}}" class="btn btn-info">Delivred</a></td>
      @else 
      <td class="text-success">Is Delivred</td>
      @endif
      <td ><a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print</a></td>

    </tr>
    @endforeach
    
    
  </tbody>
</table>


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