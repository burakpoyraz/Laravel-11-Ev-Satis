@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                @auth
                    <div class="user-img-div">
                        <img src="{{asset("assets/admin")}}/assets/img/user.png" class="img-thumbnail"/>

                        <div class="inner-text">
                            {{Auth::user()->name}}
                            <br/>
                            <small><a href="{{route("adminlogout")}}" class="inner-text">Logout</a> </small>
                        </div>
                    </div>
                @endauth

            </li>


            <li>
                <a class="{{ request()->routeIs('adminhome') ? 'active-menu' : '' }}" href="{{route("adminhome")}}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>

            <li>
                <a class="{{ request()->routeIs('admincategory') ? 'active-menu' : '' }}" href="{{route("admincategory")}}"><i class="fa fa-anchor "></i>Kategoriler</a>
            </li>

            <li>
                <a class="{{ request()->routeIs('adminemlaks') ? 'active-menu' : '' }}" href="{{route("adminemlaks")}}"><i class="fa fa-anchor "></i>İlanlar</a>
            </li>

            <li>
                <a class="{{ request()->routeIs('adminsetting') ? 'active-menu' : '' }}" href="{{route("adminsetting")}}"><i class="fa fa-anchor "></i>Ayarlar</a>
            </li>
            <li>
                <a class="{{ request()->routeIs('adminmessages') ? 'active-menu' : '' }}" href="{{route("adminmessages")}}"><i class="fa fa-anchor "></i>Mesajlar</a>
            </li>



        </ul>

    </div>


</nav>
<!-- /. NAV SIDE  -->
