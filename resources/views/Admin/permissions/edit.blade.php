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
              <h1> Edit Permissions</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Admin</a></li>
                  <li class="breadcrumb-item active">Permissions</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
              <div class="row">
        
                <!-- Left side columns -->
                <div class="col-lg-10">
                    <form method="POST" action="{{route("superadmin.permissions.update",$permission)}}"> 
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="name" class="col-form-label">Pesrmission</label>
                          <input type="text" name="name" class="form-control" value="{{$permission->name}}" required>
                          @error('name') <p style="color: red">{{$message}}</p> @enderror
                        </div>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                      </form>
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
