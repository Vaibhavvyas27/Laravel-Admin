<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
      
        <main id="main" class="main">

            <div class="pagetitle">
              <h1>Trash Page</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">{{ Auth::user()->roles->pluck('name')[0] }}</a></li>
                  <li class="breadcrumb-item active">Trash</li>
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
                    <div class="card mt-4 col-11">
                        <div class="card-body">
                            <div class="d-flex justify-content-between py-4" id="cre">
                              <h5 class="card-title p-0 mb-3"># Trash Table</h5>
                            </div>
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                      <th>
                                        <b>Role</b> Name
                                      </th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>
                                        # Actions
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($users as $user)
                                      <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                          @if(!empty($user->roles[0] ))
                                              {{-- @foreach ($user->roles as $role) --}}
                                              <span class="badge rounded-pill bg-success py-2 px-3"><i class="bi bi-check-circle me-1"></i>{{$user->roles[0]['name']}}</span>
                                              {{-- @endforeach --}}
                                          @else
                                            <span class="badge rounded-pill bg-warning py-2 px-3 text-dark"><i class="bi bi-exclamation-triangle me-1"></i>Null</span>
                                          @endif
                                        </td>
                                        <td>
                                          <div class="d-flex">
                                            <form method="POST" action="{{ route('superadmin.user.restore', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                                              @csrf
                                              <button type="submit" class="btn btn-success"><i class="fa-solid fa-rotate-right me-2"></i>Restore</button>
                                            </form>
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
                    </div>
                </div>
            </section>    
          </main>
    </div>
</x-admin-layout>
