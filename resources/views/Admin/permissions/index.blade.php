<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>

      {{-- Modal  --}}

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Permissions</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route("superadmin.permissions.store")}}"> 
                @csrf
                <div class="mb-3">
                  <label for="name" class="col-form-label">Permissions</label>
                  <input type="text" name="name" class="form-control" required>
                  @error('name') <p style="color: red">{{$message}}</p> @enderror
                </div>
                {{-- <div class="mb-3">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div> --}}
               

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>

      {{-- Main Body  --}}
      <main id="main" class="main">

        <div class="pagetitle">
          <h1>Super Admin Permissions</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Super Admin</a></li>
              <li class="breadcrumb-item active">Permissions </li>
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
              <div class="d-flex justify-content-end">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Permission</button>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Permission</b> Name
                    </th>
                    <th>
                      # Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($permissions as $permission)
                    <tr>
                      <td>{{$permission->name}}</td>
                      <td>
                        <div class="d-flex">
                          <form method="POST" action="{{ route('superadmin.permissions.destroy', $permission->id) }}" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Delete</button>
                          </form>
                          <a href="{{route('superadmin.permissions.edit',$permission->id)}}" class="btn btn-info ms-3">Edit</a>
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
    </main>
    </div>
</x-admin-layout>
