
<style>
    #sticker {
        background-color: black;
    }

    .search-area {
        background-color: black;
    }
    #sticker {
        background-color: black;
        padding: 10px 0;
        height: 60px;
    }

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <base href="/public"> --}}
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Single Product</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('front/assets/img/favicon.png') }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('front/assets/bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">

</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{ route('home') }}">Home</a>
								</li>
								<li><a href="#about">About</a></li>
								</li>
								<li><a href="{{ route('show_cart') }}">Cart</a>

								</li>
                                <li>
                                    <div class="header-icons">
                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                                            <a href="{{ route('register') }}" class="btn btn-success btn-sm">Register</a>
                                        @else
                                            <span class="user-type text-muted">نوع الحساب:
                                                {{ Auth::user()->usertype }}</span>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        @endguest
                                    </div>



                                </li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="product-section mt-150 mb-150 mr-3" style="margin: auto; width:72%; padding:40px; color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="product-image text-center">
                    <a href="single-product.html">
                        <img src="{{ $product->getFirstMediaUrl('photo') }}" alt="{{ $product->name }}" style="width:100%; height:auto; border-radius: 10px;">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details">
                    <h3 class="text-success">{{ $product->name }}</h3>
                    <p class="product-price">
                        <span class="text-primary">السعر:</span> {{ number_format($product->price, 0, '.', '') }} ج.م
                    </p>
                    <p class="product-weight">
                        <span class="text-primary">الوزن:</span> {{ number_format($product->weight, 0, '.', '') }} كجم
                    </p>
                    <form action="{{ route('add_cart',$product->id) }}" method="Post">
                        @csrf
                        <div class="col-md-4">
                            <input type="submit" value="Add To Cart" style="margin-left: 10px;">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>





	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{ asset('front/assets/img/company-logos/images (1).jfif') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('front/assets/img/company-logos/images (2).jfif') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('front/assets/img/company-logos/images (3).jfif') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('front/assets/img/company-logos/images (4).jfif') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('front/assets/img/company-logos/5.jpg') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 id="about" class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>

                            <li>التجمع الخامس / مول ووترى 2</li>
                            <li><p>Phone</p>01033702808</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="{{ route('show_cart') }}">Cart</a>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2024 <a href="">Ahmed-AlKhateeb</a>,  All Rights Reserved.</p>
				</div>

			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="{{ asset('front/assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('front/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('front/assets/js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ asset('front/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('front/assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('front/assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ asset('front/assets/js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>
</html>
