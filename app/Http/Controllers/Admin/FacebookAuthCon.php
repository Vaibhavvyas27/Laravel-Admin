<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthCon extends Controller
{
    public function loginWithFacebook(){
        // dd('done');
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook(){
        dd("dcdc");
    }
}
