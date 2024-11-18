@php
    $setting=\App\Http\Controllers\HomeController::settings()
@endphp
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{$setting->phone}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{$setting->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route("home")}}"><img src="{{asset("assets")}}/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @auth
                                <li><a href="{{ route('userhome') }}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                            @else
                                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <!--/header-bottom-->
    @include("home._menu")
    <!--/header-bottom-->
</header><!--/header-->
