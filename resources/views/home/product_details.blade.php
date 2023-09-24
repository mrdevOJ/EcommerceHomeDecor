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
        
       

    </head>
	
	<body>
		@include('sweetalert::alert')

		

		<!--welcome-hero start -->	@if(session()->has('msg'))
							<div class="alert alert-success d-flex align-items-center" role="alert">
								<svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
								<div>
									<strong>{{session()->get('msg')}}</strong> You should check in on some of those fields below.
								</div>
							  </div>										
							  @endif
		<header id="home" class="welcome-hero">
			
			<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
			
				<!--/.carousel-inner -->
				<div class="carousel-inner" role="listbox">
					<!-- .item -->
					<div class="item active">
						
						<div class="single-slide-item slide1">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
										
											<div class="single-welcome-hero">	

												

												<div class="welcome-hero-txt">
													
													<h4>great design collection</h4>
													<h2>{{$product['title']}}</h2>
													<p>
														{{$product['description']}}													</p>
													<div class="packages-price">
														<p>
															{{$product['discount_price']}}<strong> DH</strong>
															<del>{{$product['price']}} <strong>DH</strong></del>
														</p>
													</div>
													<form action="{{url('add_cart',$product->id)}}" method="post">
														@csrf
														<div class="mb-1">
															<label  class="form-label">Select Quantity</label>
															<input type="number" name="quantity" class="btn-cart welcome-add-cart h-75 w-50" min="1" max="100" >
															</div>		

													<button class="btn-cart welcome-add-cart w-75">
														<span class="lnr lnr-plus-circle"></span>
														add <span>to</span> cart
													</button>
													</form>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero ">
												<div class="welcome-hero-img shadow p-3 mb-5 bg-body-tertiary rounded">
													<img  src="product/{{$product['image']}}"  alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
			
					</div><!-- /.item .active-->
			
			
			
					
				</div><!-- /.carousel-inner-->
			
			</div><!--/#header-carousel-->
			@include('home.header')
		</header><!--/.welcome-hero-->
		<!--welcome-hero end -->


	

				 
	

		<!-- clients strat -->
		@include('home.clients')
		<!-- clients end -->

<!--newsletter strat -->
@include('home.newseltter')
<!--newsletter end -->

		<!--footer start-->
		@include('home.footer')
		<!--footer end-->
		
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