<?php

namespace App\Http\Controllers;

use App\Mail\NotifDaftar;
use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $userGoogle = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $userGoogle->id)->first();

            if ($finduser) {
                Auth::login($finduser);

                toastr()->success('Selamat Datang di Sahabat ASN.', 'Sukses');
                return redirect()->intended('dashboard');
            } else {
                $make_password = Str::random(8);
                $user = User::updateOrCreate(['email' => $userGoogle->email], [
                    'role' => 'user',
                    'name' => $userGoogle->getName(),
                    'google_id' => $userGoogle->getId(),
                    'avatar' => $userGoogle->getAvatar(),
                    'password' => Hash::make($make_password)
                ]);


                // Mail::to($user->email)->send(new NotifDaftar($user, $make_password));
                Auth::login($user);

                toastr()->success('Selamat Datang di Sahabat ASN.', 'Sukses');
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
