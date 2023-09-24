<!-- top-area Start -->
<div class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

            <!-- Start Top Search -->
            <div class="top-search w-100 m-1">
                <div class="">
                    <form action="{{url('searchProduct')}}" method="GET">
                        @csrf
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" name="searchProduct" class="form-control" placeholder="Search Product name">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </form>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">            
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        @if (Route::has('login'))
                        @auth
                            @if(Auth::check())

                        <li class="nav-setting">
                                  <a href=""> <span> <form id="logout-form" action="{{ url('logout') }}" method="POST">
                                                {{ csrf_field() }}
                                        <button type="submit">Logout</button>
                                    </form>
                                 </span></a>
                                  
                        
                        </li> <li>  <a href="{{url('/user/profile')}}"><span>Dashboard</span></a></li> 
                                   
                                
                                                   @endif

                        @else

                        <li class="nav-setting">
                            <a href="{{ route('login') }}"><span class="">login</span></a>
                        </li>
                        <li class="nav-setting">
                            <a href="{{ route('register') }}"><span class="">register</span></a>
                        </li>
                        @endauth
                        @endif
                        <li class="search">
                            <a href="#"><span class="lnr lnr-magnifier"></span></a>
                        </li>
                        
           

                    </ul>
                </div><!--/.attr-nav-->
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{url('/?page=1')}}">CB<span>Eco</span>.</a>

                </div><!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class=" scroll active"><a href="#home">home</a></li>
                        <li class="scroll"><a href="#new-arrivals">new arrival</a></li>
                        <li class="scroll"><a href="#feature">features</a></li>
                        <li class=""><a href="{{url('/show_cart')}}">cart</a></li>
                        <li class=""><a href="{{url('show_order')}}">order</a></li>
                    </ul><!--/.nav -->
                </div><!-- /.navbar-collapse -->
            </div><!--/.container-->
        </nav><!--/nav-->
        <!-- End Navigation -->
    </div><!--/.header-area-->
    <div class="clearfix"></div>

</div><!-- /.top-area-->
<!-- top-area End -->
