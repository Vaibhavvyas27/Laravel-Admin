<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('superadmin.roles.store')}}"> 
              <div class="modal-body">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="col-form-label">Role</label>
                    <input type="text" name="name" class="form-control" required>
                    @error('name') <p style="color: red">{{$message}}</p> @enderror
                  </div>
                  <div class="row mb-3">
                      <legend class="col-form-label col-6 mb-2 pt-0">Check Permissions</legend>
                    @foreach ($permissions as $permission)
                      <div class="form-check ms-lg-3">
                        <input class="form-check-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                          {{ $permission->name }}
                        </label>
                      </div>
                    @endforeach
                    
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- main body  --}}

        <main id="main" class="main">

            <div class="pagetitle">
              <h1>Super Admin Roles</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">SuperAdmin</a></li>
                  <li class="breadcrumb-item active">Roles</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
              @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{Session::get('message')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="row">
        
                <!-- Left side columns -->
                <div class="col-lg-10">
                  <div class="d-flex justify-content-end" id="cre">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Role</button>
                  </div>
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>
                          <b>Role</b> Name
                        </th>
                        <th>
                          # Actions
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role)
                        <tr>
                          <td>{{$role->name}}</td>
                          <td>
                            <div class="d-flex">
                              <form method="POST" action="{{ route('superadmin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              <a href="{{route('superadmin.roles.edit',$role->id)}}" class="btn btn-info ms-3">Edit</a>
                            
                            </div>
                          </td>
                        </tr>
                      @endforeach 
                       
                  </table>  
                  {{-- @foreach ($roles as $role)
                      <h4>{{$role->name}}</h4>
                  @endforeach --}}
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
