@extends('layouts.master2')
@section('css')

<style>
.loginform{
 display: none;
}
</style>

    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')

            <!-- The content half -->
            <div class=" bg-white">
                <div class="login d-flex align-items-center  py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row ">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                                <br>
                                                <br>
                                                <br>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 text-center" style="margin-right:110px">Balck<span>Coffee</span></h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2 class="text-center">Welcome back</h2>


                                            <div class="form-group text-center" style="width: 75%; margin-right:110px">
                                                <label class="text-center text-success" style="font-size: 35px" for="exampleFormControlselect1">حدد طريقة الدخول</label>
                                                <select  id="sectionChooser" class="form-control">
                                                    <option value="" selected disabled >أختارمن القائمه</option>
                                                    <option value="user" >User</option>
                                                    <option value="admin">Admin</option>

                                                </select>
                                            </div>




                                            {{-- formUser --}}
                                            <div class="loginform" id="user">


                                            <h5 class="font-weight-semibold mb-4">User</h5>

                                            <form class="" method="POST" action="{{ route('login.user') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label> <input class="form-control"
                                                        placeholder="Enter your email" type="email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label> <input class="form-control"
                                                        placeholder="Enter your password" type="password" name="password">
                                                </div><button type="submit" class="btn btn-main-primary btn-block">Sign
                                                    In</button>


                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">Forgot password?</a></p>
                                                <p class="text-center text-danger" style="font-size: 25px"> <a  href="{{ route('register') }}">
                                                    أنشاء حساب جديد</a></p>
                                            </div>
                                        </div>
                                        </div>


                                        {{-- form Admin --}}
                                        <div class="loginform" id="admin">


                                            <h5 class="font-weight-semibold mb-4">Admin</h5>

                                            <form class="" method="POST" action="{{ route('login.admin') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label> <input class="form-control"
                                                        placeholder="Enter your email" type="email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label> <input class="form-control"
                                                        placeholder="Enter your password" type="password" name="password">
                                                </div><button type="submit" class="btn btn-main-primary btn-block">Sign
                                                    In</button>

                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">Forgot password?</a></p>
                                                <p class="text-center text-danger" style="font-size: 25px"> <a  href="{{ route('register') }}">
                                                    أنشاء حساب جديد</a></p>
                                            </div>
                                        </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')

<script>
    $('#sectionChooser').change(function(){
        var myID = $(this).val();
        $('.loginform').each(function(){
            myID === $(this).attr('id') ? $(this).show() : $(this).hide();
        });
    });
</script>




@endsection
