@php
  $current_route=request()->route()->getName();
@endphp
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{$current_route=='dashboard'?'active':''}}" href="/dashboard" >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{$current_route=='profile.show'?'active':''}}" href="{{route('profile.show')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      @role('SuperAdmin')
          {{-- <li class="nav-item">
            <a class="nav-link {{$current_route=='superadmin.index'?'active':''}}" href="{{route('superadmin.index')}}">
              <i class="bi bi-person"></i>
              <span>Admin Page</span>
            </a>
          </li> --}}
        <li class="nav-item">
          <a class="nav-link {{$current_route=='superadmin.roles.index'?'active':''}}" href="{{route('superadmin.roles.index')}}">
            <i class="fa-regular fa-flag"></i>
            <span>Roles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$current_route=='superadmin.permissions.index'?'active':''}}" href="{{route('superadmin.permissions.index')}}">
            <i class="fa-solid fa-key"></i>
            <span>Permissions</span>
          </a>
        </li>

      @endrole

      @role('SuperAdmin|Admin')
        <li class="nav-item">
          <a class="nav-link {{$current_route=='superadmin.users.index'?'active':''}}" href="{{route('superadmin.users.index')}}">
            <i class="fa-solid fa-users"></i>
            <span>User Management</span>
          </a>
        </li>
      @endrole

      <li class="nav-item">
        <a class="nav-link" href="{{route('trip.index')}}">
          <i class="fa-solid fa-house"></i>
          <span>Front End </span>
        </a>
      </li>

      @can('Create Blog')
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog.post.index')}}">
            <i class="fa-solid fa-file-pen"></i>
            <span>Create Blog</span>
          </a>
        </li>
      @endcan


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}" @click.prevent="$root.submit();">
          <i class="bi bi-box-arrow-right"></i>
                {{ __('Log Out') }}
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
