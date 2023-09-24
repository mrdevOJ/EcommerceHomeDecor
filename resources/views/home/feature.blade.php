<section id="feature" class="feature">
    <div class="container">
        <div class="section-header">
            <h2>featured products</h2>
        </div><!--/.section-header-->
        <div class="feature-content">
            <div class="row">
                @foreach($feature as $feature)
                <div class="col-sm-3">
                    <div class="single-feature">
                        <img src="product/{{$feature->image}}" alt="feature image">
                        <div class="single-feature-txt text-center">
                            <p>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                                <span class="feature-review">({{rand(10,1000)}} review)</span>
                            </p>
                            <h3><a href="#">{{$feature->title}}</a></h3>
                            <h5>{{$feature->price}} <strong>DH</strong></h5>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div><!--/.container-->

</section><!--/.feature-->