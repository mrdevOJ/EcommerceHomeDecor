<section id="new-arrivals" class="new-arrivals">
    <div class="container">
        <div class="section-header">
            <h2>new arrivals</h2>
        </div><!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-1">
               
 @foreach($product as $products) 
              <a href="{{url('product_details',$products->id)}}"  >
                <div class="col-md-4 col-sm-5">
                    <div class="single-new-arrival">
                        <div class="single-new-arrival-bg">
                            <img src="/product/{{$products['image']}}" alt="new-arrivals images"/>
                            <div class="single-new-arrival-bg-overlay"></div>
                            @if($products->quantity <= 50)
                            <div class="sale bg-1">
                                <p>sale</p>
                            </div>
                            @endif
                            @if( $products->quantity < 100 && $products->quantity > 50)
                            <div class="sale bg-2">
                                <p>sale</p>
                            </div>
                            @endif
                            <div class="new-arrival-cart">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <a href="#">add <span>to </span> cart</a>
                                </p>
                                <p class="arrival-review pull-right">
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-frame-expand"></span>
                                </p>
                            </div>
                        </div>
                        <h4><a href="#">{{$products['title']}}</a></h4>
                        @if( $products->quantity <30)
                        <p class="arrival-price" style="text-decoration: line-through">{{$products['price']}} <strong > DH </strong></p>

                        <p class="arrival-product-price">{{$products['discount_price']}} <strong > DH </strong></p>

                        @else
                        <p class="arrival-product-price">{{$products['price']}} <strong > DH </strong></p>
                        @endif
                    </div>
                </div> 
                                   </a>

                @endforeach
                              
        </div>   
       
    {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
    </div><!--/.container--> <style>
         .pagination>li>a,.pagination>li>span  {
            color: #e99c2e;
          }
          .pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover {
            z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #e99c2e;
    border-color:  #e99c2e;
          }
          .pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover {
            z-index: 2;
    color:  #e99c2e;;
    background-color: #eee;
    border-color: #ddd
          }
        </style>
    <section >
        <form action="{{url('add_comment')}}" method="post">
            @csrf
            <div class="form-floating m-1" >

                <textarea name="comment" id="" cols="70" rows="7" class="form-control"></textarea>
                             
</div>   <button type="submit" class="btn m-1 float-right" style="background-color: #e99c2e; color:aliceblue">Comment</button>
            </form>
        <div class="container my-5 py-5">
            
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10">
              <div class="card text-dark">
                <hr class="my-0" />
                <h4 class="mb-0">Recent comments</h4>
                <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
    @foreach($comment as $comment)
                <div class="card-body p-4">
                  <div class="d-flex flex-start">
                    <img class="rounded-circle shadow-1-strong me-3"
                      src="https://th.bing.com/th/id/R.7ea4af7d8401d2b43ee841bfa2abe89d?rik=xidyUKdveUKULQ&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-download-icons-logos-emojis-users-2240.png&ehk=2%2bOqgdMZqFkKaBclc%2fPL9B86vLju3iBGiFmH64kXaTM%3d&risl=&pid=ImgRaw&r=0" alt="avatar" width="60"
                      height="60" />
                    <div>
                      <h6 class="fw-bold mb-1">{{$comment['name']}}</h6>
                      <div class="d-flex align-items-center mb-3">
                        <p class="mb-0">{{date("M jS, Y", strtotime($comment['created_at']));}}
                          <a class="badge bg-primary" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{$comment->id}}" >Reply</a>
                        </p>
                      
                      </div>
                      <p class="mb-0">
                        {{$comment['comment']}}
                      </p>
                    </div>

                  @foreach($reply as $replys)
                  @if($replys->comment==$comment->id)
                  <img src="https://th.bing.com/th/id/R.bde7b5f09b8d30c3a8a1e8b24e9c0484?rik=0UYsJjaURxQyTQ&pid=ImgRaw&r=0" width="2%" alt="">

                    <div class="card-body" style="margin-left: 20px ; margin-top : -10px">
                      <h6 class="fw-bold mb-1">{{$replys['name']}}</h6>
                      <p class="mb-0">
                        {{$replys['reply']}}
                      </p>
                    </div>
                    @endif
                    @endforeach


                  </div>
                </div>
                
                <hr class="my-0" />
      @endforeach
     
        <div class="form-floating m-1 replyDiv" style="display: none;" >
 <form action="{{url('add_reply')}}" method="post">
        @csrf
                <textarea name="reply" id="" cols="70" rows="7"  class="form-control"></textarea> <br>
                <input type="hidden"  name="commentId" id="commentId">
                <button type="submit" class="btn btn-primary">Reply</button>
                <button href="javascript::void(0)" class="btn btn-danger"  onclick="reply_close(this)">Close</button>
</form>

                </div>


              </div>
            </div>
          </div>
        </div>
      </section>
</section><!--/.new-arrivals-->
<script type="text/javascript">
    function reply(caller){
      document.getElementById('commentId').value=$(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show()
    }
    function reply_close(caller){
        $('.replyDiv').hide()
    }
</script>