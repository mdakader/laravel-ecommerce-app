<div class="dashboard_sidebar">
        <span class="close_icon">
          <i class="far fa-bars dash_bar"></i>
          <i class="far fa-times dash_close"></i>
        </span>
    <a href="dsahboard.html" class="dash_logo"><img src="{{asset('frontend/images/logo.png')}}" alt="logo"
                                                    class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a class="active" href="{{url('/vendor/dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
        <li><a class="active" href="{{route('vendor.products.index')}}"><i class="fas fa-tachometer"></i>Products</a></li>
        <li><a class="{{setActive(['vendor.orders.*'])}}" href="{{route('vendor.orders.index')}}"><i class="fas fa-box"></i> Orders</a></li>
        <li><a class="{{setActive(['vendor.reviews.index'])}}" href="{{route('vendor.reviews.index')}}"><i class="fas fa-star"></i> Review</a></li>
        <li><a href="{{route('vendor.shop-profile.index')}}"><i class="far fa-user"></i> Shop Profile</a></li>
        <li><a href="{{route('vendor.profile')}}"><i class="far fa-user"></i> My Profile</a></li>

        <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                       this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
        </li>

    </ul>
</div>
