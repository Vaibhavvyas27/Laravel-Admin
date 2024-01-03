<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

                

                {{-- <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button> --}}
                <div class="col-12 my-4" >
                    <button class="btn btn-primary w-100" type="submit" style="background-color: blue">{{ __('Log in') }}</button>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div style="height:1px;background-color:black;width:45%"></div>
                    <p>or</p>
                    <div style="height:1px;background-color:black;width:45%"></div>
                </div>
                {{-- <hr> --}}
                <style>
                    .google-login-btn:hover{
                        background-color: rgb(245, 213, 155) !important;
                        color: black !important;
                        
                    }
                    .google-login-btn{
                        display: flex !important;
                        flex-direction: row !important;
                        align-items: center;
                        justify-content: center;
                    }

                    .facebook-login-btn:hover{
                        background-color: rgb(155, 188, 245) !important;
                        color: black !important;
                    }
                    
                </style>
                <div class="col-12 my-4" >
                    <a href="{{route('g_login')}}" class="btn btn-primary w-100 google-login-btn"  style="background-color: white;color:black;border-color:orange"><img src="/images/google-logo.png" class="me-2" width="25px" alt=""> <b>Continue With Google</b></a>
                </div>
                <div class="col-12 my-4" >
                    <a href="{{route('facebook_login')}}" class="btn btn-primary w-100 facebook-login-btn"  style="background-color: white;color:black;border-color:rgb(112, 112, 230)"><i class="fa fa-facebook me-2"></i>  <b>Continue With Facebook</b></a>
                </div>
                <div class="col-12 mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <div class="col-12 mt-4">
                    @if (Route::has('register'))
                        Don't Have Account<a href="{{ route('register') }}" class="ml-3 font-semibold"><u class="m-0">click here</u></a>
                    @endif
                </div>
               
        </form>
    </x-authentication-card>
</x-guest-layout>
