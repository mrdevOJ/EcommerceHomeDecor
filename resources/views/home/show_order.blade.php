<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<base href="/public">

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Omar Ezr E-commerce</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </head>
	
	<body>

		@include('sweetalert::alert')


		<!--welcome-hero start -->
		<header id="home" class="welcome-hero">
					@include('home.header')

		</header><!--/.welcome-hero-->
		<!--welcome-hero end -->


	
       
	



        <div class="container mt-5">
           
            <div class="row mt-5">
                <div class="co mt-5">
                            <table class="table table-striped table-hover mt-5">
                                @if(session()->has('msg'))
                                <div class="alert alert-secondary" role="alert">
                                    <strong>{{session()->get('msg')}}</strong> 
                    
                                                      </div>
                                                  @endif

                                <thead>         

                                  <tr>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($order as $cart)
                                  <tr>
                                    <th scope="row">{{$cart['product_title']}}</th>
                                    <td >{{$cart['quantity']}}</td>
                                    <td> {{$cart['price']}}</td>
                                    <td class="w-25 border rounded"><img  width="45%" src="product/{{$cart['image']}}"  alt="slider image"></td>
                                    <td ><a class="link " onclick="confirmation(event)" style="color:#e99c2e" href="{{url('delete_order',$cart->id)}}">Delete</a></td>
                                  </tr>
                                  @endforeach
                                

                                </tbody>
                              </table>
                               
                </div><!--/.col-->
                
            </div><!--/.row-->
    </div><!-- /.container-->

		<!-- clients strat -->
		@include('home.clients')
		<!-- clients end -->
<!--newsletter strat -->
@include('home.newseltter')
<!--newsletter end -->

		<!--footer start-->
		@include('home.footer')
		<!--footer end-->
		<script>
            function confirmation(ev) {
              ev.preventDefault();
              var urlToRedirect = ev.currentTarget.getAttribute('href');  
              console.log(urlToRedirect); 
              swal({
                  title: "Are you sure to cancel this product",
                  text: "You will not be able to revert this!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willCancel) => {
                  if (willCancel) {
      
      
                       
                      window.location.href = urlToRedirect;
                     
                  }  
      
      
              });
      
              
          }
          </script>
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>