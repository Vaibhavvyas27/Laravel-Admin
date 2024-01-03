<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    {{-- <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div> --}}
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Profile</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section profile">
          <div class="row">
            <div class="col-xl-12">
    
              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                      </li>
    
                  </ul>
                    <div class="tab-content pt-2">


                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                @livewire('profile.update-profile-information-form')
                                <x-section-border />
                            @endif
                        </div>
        
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            @livewire('profile.update-password-form')
            
                        </div>
    
                    </div><!-- End Bordered Tabs -->
    
                </div>
              </div>
    
            </div>
          </div>
        </section>
    
      </main><!-- End #main -->
</x-app-layout>
