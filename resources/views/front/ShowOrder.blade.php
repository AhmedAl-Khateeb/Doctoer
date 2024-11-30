
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Show_Orders</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="front/assets/img/favicon.png">
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

                        </div>

                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li><a href="#about">About</a></li>


                                <li><a href="{{ route('show_cart') }}">Cart</a>
                                    <li><a href="{{ route('show_order') }}">Your_Orders</a>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->





    <div class="cart-section mt-150 mb-150">
        <div class="container">


            @if (session()->has('Add'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong> {{ session()->get('Add') }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <script>
                setTimeout(function() {
                    $('.alert').fadeOut('slow');
                }, 4000);
            </script>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table" style="width: 100%; border-collapse: collapse;">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-image" style="text-align: left;">Image</th>
                                    <th class="product-name" style="text-align: left;">Product Name</th>
                                    <th class="product-price" style="text-align: right;">Price</th>
                                    <th class="product-quantity" style="text-align: right;">Quantity</th>
                                    <th class="product-delivery_status" style="text-align: right;">Delivery_Status</th>
                                    <th class="product-cancel_order" style="text-align: right;">Cancel Order</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                <tr class="table-body-row">
                                    <td class="product-image" style="padding: 10px;">
                                        <img src="{{ optional($item->product)->getFirstMediaUrl('photo') }}"
                                             alt="{{ $item->product_name }}"
                                             style="width: 250px; height: 100px; border-radius: 10px;">
                                    </td>
                                    <td class="product-name" style="padding: 10px;">{{ $item->product_name }}</td>
                                    <td class="product-price" style="padding: 10px; text-align: right;">EGP : {{ number_format($item->price, 0, '.', '') }}</td>

                                    <td class="product-total" id="total-{{ $item->id }}" style="padding: 10px; text-align: right;">
                                        EGP : {{ number_format($item->quantity * $item->price, 0, '.', '') }}
                                    </td>
                                    <td
                                    class="{{ $item->delivery_status == 'Delivered' ? 'text-success' : 'text-danger' }}">
                                    {{ $item->delivery_status }}
                                </td>

                                <td>
                                    @if($item->delivery_status == 'processing')
                                    <a onclick="return confirm('هل تريد الغاء هذاالطلب')"
                                    href="{{ route('cancel_order',$item->id) }}" class="btn btn-danger">Cancel Order</a>
                                    @else
                                    <p class="btn btn-primary">Not Allowed</p>
                                    @endif
                                </td>

                                @endforeach


                            </tbody>
                        </table>



                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end cart -->


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
                        <li><a href="#contact">Contact</a></li>
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
                <p>Copyrights &copy; 2024 - <a
                        href="https://www.facebook.com/profile.php?id=100010285750278">Ahmed-AlKhateeb</a>, All
                    Rights Reserved.</p>
            </div>

        </div>
    </div>
</div>








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
    <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('front/assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('front/assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>

</html>
<script>
    function updateTotal(input, price, itemId) {
        const quantity = input.value;
        const total = price * quantity;

        document.getElementById(`total-${itemId}`).innerText = `EGP : ${total}`;

        let grandTotal = 0;
        document.querySelectorAll('.product-total').forEach(function(totalElement) {
            const totalText = totalElement.innerText.replace('EGP : ', '');
            grandTotal += parseFloat(totalText) || 0;
        });

        document.getElementById('grand-total').innerText = `EGP : ${grandTotal}`;
    }
    </script>

