<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

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
    <style>
        body {
            background-image: url('{{ asset("front/assets/img/company-logos/45.jpg") }}');
            background-size: cover; /* لجعل الصورة تغطي الشاشة بالكامل */
            background-repeat: no-repeat; /* منع تكرار الصورة */
            background-position: center; /* تحديد مكان الصورة في المنتصف */
        }

        .custom-card-bg {
    background-color: #ffffff; /* خلفية بيضاء */
    color: #000; /* لون النص الأسود */
    padding: 20px;
    border-radius: 10px; /* إذا كنت تريد الزوايا مستديرة */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* إذا أردت إضافة ظل للكارت */
}


    </style>



    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-scondry bg-soft">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-primary p-4 text-center">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue </p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="index.html" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="index.html" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                        </div>@endif
                                    @if (Session::has('fail'))
                                    <div class="alert alert-danger"> {{Session::get('fail')}}</div>
                                    @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light w-100" type="submit">Log In</button>
                                        </div>


                                        <div class="mt-4 text-center ">
                                            <h5 class="font-size-14 mb-3"></h5>
                                            <a href="{{ route('login.google') }}"
                                            style="background-color: teal; color: black; padding: 15px; font-size: 18px; text-align: center; display: inline-block; border-radius: 5px;"
                                            class="waves-effect waves-light w-100">
                                            Sign in with Google
                                         </a>

                                            <ul class="list-inline">

                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                        <Icon path={mdiGooglePlus} size={1} />

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center custom-card-bg">
                            <div>
                                <p>تسجيل حساب جديد ? <a href="{{ route('register') }}" class="fw-medium text-primary"> Signup now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Copyrights <i class="mdi mdi-heart text-danger"></i> by  <a  href="https://www.facebook.com/profile.php?id=100010285750278">Ahmed-AlKhateeb</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->


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
