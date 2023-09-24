{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Home Admin</title>
    <base href="/public">
    @include('admin.css')
<style>
  .div_center{
    text-align: center;
    padding-top: 40px;
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
  <div class="content-wrapper ">
    @if(session()->has('msg'))
    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      {{session()->get('msg')}}
    </div>
    @endif
    <div class="row ">
          </div class="div_center">
          <h2 class="text-center">update Product</h2>
          <form action="{{url('/update_product',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Title Product</label>
          
            <input type="text" class="form-control" name="title" value="{{$product->title}}" placeholder="Write Product name" required>  </div>
          
            <div class="mb-3">    <label for="" class="form-label">description Product</label>
          
            <input type="text"class="form-control" name="description" value="{{$product->description}}" placeholder="Write description" required></div>
          
            <div class="mb-3">    <label for="" class="form-label">image Product</label>

            <input type="file" class="form-control" name="image" value="{{$product->image}}" placeholder="upload image Product" required></div>
            <img src="/product/{{$product->image}}" height="100" width="100"style="margin:auto" alt="">

            <div class="mb-3">    <label for="" class="form-label">category Product</label>
          <select name="category" class="form-control mb-1 w-100 text-light" placeholder="Write category name" id="" required>
              <option value="" selected>Add Category</option>
          
              @foreach($category as $category)
          
              <option value="{{$category->category_name}}">{{$category->category_name}}</option>
              @endforeach
          </select>
          
            <div class="mb-3">    <label for="" class="form-label">quantity Product</label>
          
            <input type="number" class="form-control" min="0" name="quantity" value="{{$product->quantity}}" placeholder="Write quantity" required></div>
          
            <div class="mb-3">    <label for="" class="form-label">price Product</label>
          
            <input type="number" class="form-control" name="price" value="{{$product->price}}"  placeholder="Write price" required></div>
          
            <div class="mb-3">    <label for="" class="form-label">discount price Product</label>
          
            <input type="number" class="form-control" name="discount_price" value="{{$product->discount_price}}" placeholder="Write discount_price"></div>
          
            <div class="mb-3">    
          
            <input type="submit" name="submit" value="Edit Product" class="btn btn-primary text-center w-100"></div>
          
          </form>

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