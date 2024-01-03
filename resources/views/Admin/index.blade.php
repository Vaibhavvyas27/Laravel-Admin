<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <main id="main" class="main">

            <div class="pagetitle">
              <h1>{{ Auth::user()->roles->pluck('name')[0] }}</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">{{ Auth::user()->roles->pluck('name')[0] }}</a></li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
          </main>
    </div>
</x-admin-layout>
