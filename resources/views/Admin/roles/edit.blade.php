<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
      {{-- main body  --}}

        <main id="main" class="main">

            <div class="pagetitle">
              <h1> Edit Roles</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Admin</a></li>
                  <li class="breadcrumb-item active">Roles</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
              <div class="row">
        
                <!-- Left side columns -->
                <div class="col-lg-10">
                    <form method="POST" action="{{route('superadmin.roles.update',$role)}}"> 
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="col-form-label">Edit Role</label>
                          <input type="text" name="name" class="form-control" value="{{$role->name}}" required>
                          @error('name') <p style="color: red">{{$message}}</p> @enderror
                        </div>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                      </form>
                </div> 
                
                <div class="card mt-4 col-6">
                  <div class="card-body">
                    <h5 class="card-title">Add Permissions to Role</h5>
      
                    @if (Session::has('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    @if (Session::has('message-warning'))
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{Session::get('message-warning')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="row g-3 d-flex justify-content-between">
                      <!-- No Labels Form -->
                      <form class="row g-3 col-6" method="POST" action="{{route('superadmin.give.permission',$role->id)}}">
                        @csrf

                        <div class="col-md-12">
                          <div class="row mb-3">
                            <legend class="col-form-label col-12 mb-2 pt-0"><h5>Check Permissions :-</h5></legend>
                          @foreach ($permissions as $permission)

                            @if ($role->hasPermissionTo($permission->name))
                              <div class="form-check ms-lg-3">
                                <input class="form-check-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox" id="gridCheck1" checked>
                                <label class="form-check-label" for="gridCheck1">
                                  {{ $permission->name }}
                                </label>
                              </div>
                            @else
                              <div class="form-check ms-lg-3">
                                <input class="form-check-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                  {{ $permission->name }}
                                </label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                        </div>
                        <div class="text-start mt-0">
                          <button type="submit" class="btn btn-primary">Save..</button>
                        </div>
                      </form><!-- End No Labels Form -->
                    </div>

                  </div>
                </div>
                
              </div>    
            </section>
            <script>
                var elem = document.getElementById('cre')
                console.log(elem);
            </script>
        </main>
    </div>
</x-admin-layout>
