<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthCon extends Controller
{
    public function loginWithGoogle(){
        // dd('Done');
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(){
        try {
            // dd('dcds');
            $user = Socialite::driver('google')->user();
            $is_user =  User::where('email', $user->getEmail())->first();
            if(!$is_user){
                $saveUser =User::create(
                    [
                        'name'=>$user->getName(),
                        'email'=>$user->getEmail(),
                        'password' => Hash::make($user->getName().'@12345'),
                        'google_id'=>$user->getId()
                    ]
                );
            }
            else{
                $saveUser = User::where('email',$user->getEmail())->update([ 
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }
            Auth::loginUsingId($saveUser->id);
            return redirect()->route('trip.index');


        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
