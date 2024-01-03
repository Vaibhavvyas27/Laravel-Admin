@php
  $current_route=request()->route()->getName();
@endphp
<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">

          <div class="col-3 ">
            <div class="site-logo">
              <a href="index.html" class="font-weight-bold">
                <img src="/images/logo.png" alt="Image" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-9  text-right">
            

            <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

            

            <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto ">
                <li class="{{$current_route=='trip.index'?'active':''}}"><a href="{{route('trip.index')}}" class="nav-link">Home</a></li>
                @role('Admin|SuperAdmin')
                  <li><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                @endrole
                <li><a class="nav-link" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                  <i class="bi bi-box-arrow-right"></i>
                        {{ __('Log Out') }}
                </a></li>
              </ul>
            </nav>
          </div>

          
        </div>
      </div>

    </header>