<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url(users/images/publishimage.avif);">
            </div>
            <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
      <div class="heading-section">
          <span class="subheading">Welcome To Ebook Company</span>
        <h2 class="mb-4">Authors Established a Publishing Firm.</h2>

        <p>In an era where traditional publishing often overlooks new voices, a group of determined authors banded together to establish their own publishing firm. Fueled by a shared passion for storytelling, they aimed to create a platform that prioritizes diverse narratives. This venture allowed them to retain creative control and promote underrepresented authors. </p>
        <p>By leveraging their industry knowledge, they streamlined the publishing process and cut unnecessary costs. Their firm quickly gained recognition for its innovative approach and commitment to quality. Through collaboration, they fostered a supportive community of writers and readers. This bold move not only empowered the authors but also reshaped the landscape of independent publishing.</p>

        <a href="/comingsoon" class="btn btn-primary">View All Books</a>
      </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
<div class="container-fluid px-md-4">
    <div class="row justify-content-center pb-5 mb-3">
  <div class="col-md-7 heading-section text-center ftco-animate">
      <span class="subheading">Books</span>
    <h2>New Release</h2>
  </div>
</div>
    <div class="row">
        @foreach ($book as $b)
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="book-wrap d-lg-flex">
                <div class="img d-flex justify-content-end" style="background-image: url({{url('bookimg' , $b->image)}});">
                    <div class="in-text">
                        <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Add to cart">
                            <span class="flaticon-shopping-cart"></span>
                        </a>
                        <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
                            <span class="flaticon-heart-1"></span>
                        </a>
                        <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Quick View">
                            <span class="flaticon-search"></span>
                        </a>
                        <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Compare">
                            <span class="flaticon-visibility"></span>
                        </a>
                    </div>
                </div>
                <div class="text p-4">
                    <p class="mb-2"><span class="price">${{$b->type}}</span></p>
                    <h2><a href="#">{{$b->bookname}}</a></h2>
                    <span class="position">By {{$b->author}}</span>
                    <p>{{$b->description}}</p>
                    @if ($b->type === "free")
                        <a target="_blank" href="{{url('bookfile' , $b->file)}}" class="btn btn-dark">Read Book</a>
                    @else
                    @if(Auth::id())
                        @php
                            $hasPendingRequest = false;
                            $hasApprovedRequest = false;
                        @endphp
                        @foreach ($status as $s )
                            @if ($s->status == "Approved" && $s->username == Auth::user()->name)
                            @php
                                $hasApprovedRequest = true;
                        @endphp
                        @break
                        @elseif ($s->status == "Pending" && $s->username == Auth::user()->name)
                        @php
                        $hasPendingRequest = true;
                    @endphp
                    @break
                            @endif
                        @endforeach


                    @if ($hasApprovedRequest)
                        <a target="_blank" href="{{url('bookfile' , $b->file)}}" class="btn btn-dark">Read Book</a>
                    @elseif ($hasPendingRequest)
                        <p>Request Has pending</p>
                        <a href="{{url('cancel_req' , $s->id)}}" class="btn btn-dark">Cancel Request</a>
                        @else
                        <a href="{{url('place_order' , $b->id)}}" class="btn btn-dark">Subscribe</a>
                    @endif

                    @else
                        <a href="/login" class="btn btn-dark">Authenticate</a>
                    @endif

                    @endif
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
</section>
