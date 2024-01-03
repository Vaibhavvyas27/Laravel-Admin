<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Super Admin Page</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('superadmin.index') }}">SuperAdmin</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <section class="section dashboard profile mt-4">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <h5 class="card-title pt-0">User Info</h5>
                                <img src="/assets/img/Profile-2.png" alt="Profile" class="rounded-circle">
                                <h2 class="mt-2">{{ $user->name }}</h2>
                                <h3 class="mt-2">{{ $user->email }}</h3>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <h5 class="card-title pt-2">Assing Role To User</h5>
                                @if (Session::has('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (Session::has('message-warning'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ Session::get('message-warning') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="g-4 col-6">
                                        {{-- @role('SuperAdmin') --}}
                                        @if (!empty($user->roles[0]) && $user->roles[0]->name == 'SuperAdmin' && !auth()->user()->hasRole('SuperAdmin'))
                                            <h4 class="">You Can't Edit Super Admin Roles</h4>
                                        @else
                                            <form class="row g-3" method="POST"
                                                action="{{ route('superadmin.user.add.role', $user->id) }}">
                                                @csrf
                                                <div class="row mb-3">
                                                    {{-- <legend class="col-form-label col-12 mb-2 pt-0"></legend> --}}
                                                    <div class="col-sm-10">
                                                        <label for="role">
                                                            <h6>Select Roles :-</h6>
                                                        </label>
                                                        <select class="form-select" name="role"
                                                            aria-label="Default select example">
                                                            <option value="default">Select ....</option>
                                                            @foreach ($roles as $role)
                                                                @if ($role->name=='SuperAdmin' && !auth()->user()->hasRole('SuperAdmin'))
                                                                    @continue
                                                                @else
                                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>   
                                                                @endif
                                                            @endforeach
                                                            <option value="delete" style="background: rgb(209, 96, 96)">* Revoke Role *</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="text-start mt-0">
                                                    <button type="submit" class="btn btn-primary">Save..</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="card col-6">
                                        <div class="card-body">
                                            <h5 class="card-title">Assigned Roles</h5>
                                            @if (!empty($user->roles[0]))
                                                @foreach ($user->roles as $role)
                                                    <span class="badge rounded-pill bg-success py-2 px-3"><i
                                                            class="bi bi-check-circle me-1"></i>{{ $role->name }}</span>
                                                @endforeach
                                            @else
                                                <h6>User Don't Have Any Rules</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-admin-layout>
