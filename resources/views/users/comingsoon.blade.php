<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ebook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="users/css/animate.css">

    <link rel="stylesheet" href="users/css/owl.carousel.min.css">
    <link rel="stylesheet" href="users/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="users/css/magnific-popup.css">

    <link rel="stylesheet" href="users/css/flaticon.css">
    <link rel="stylesheet" href="users/css/style.css">
  </head>
  <body>

  	<div class="container-fluid px-md-5  pt-4 pt-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<a class="navbar-brand" href="index.html">Ebook <span>Company</span> <small>Yaseen Hashmani</small></a>
						</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="#" class="searchform order-lg-last">
			          <div class="form-group d-flex">
			            <input type="text" class="form-control pl-3" placeholder="Search">
			            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
			          </div>
			        </form>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="https://www.facebook.com/" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="https://x.com/?lang=en" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="https://www.instagram.com/" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="https://www.linkedin.com/in/muhammad-yaseen-210539315/" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Linkdin</i></span></a>

		    		</p>
	        </div>
				</div>
			</div>
		</div>
        @include('users.navbar');
    <!-- END nav -->

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

    @include('users.footer');

    <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="users/js/jquery.min.js"></script>
  <script src="users/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="users/js/popper.min.js"></script>
  <script src="users/js/bootstrap.min.js"></script>
  <script src="users/js/jquery.easing.1.3.js"></script>
  <script src="users/js/jquery.waypoints.min.js"></script>
  <script src="users/js/jquery.stellar.min.js"></script>
  <script src="users/js/owl.carousel.min.js"></script>
  <script src="users/js/jquery.magnific-popup.min.js"></script>
  <script src="users/js/jquery.animateNumber.min.js"></script>
  <script src="users/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="users/js/google-map.js"></script>
  <script src="users/js/main.js"></script>
