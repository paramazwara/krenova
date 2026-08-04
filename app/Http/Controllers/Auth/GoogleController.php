<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Exception;
use App\Users;
// session_start();

class GoogleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            /*
            $finduser = Users::select('users.*')
                                ->where('g_id', $user->id)
                                ->where('status', '0')
                                ->get();
            */

            // $finduser = Users::where('g_id', $user->id)->first();
            $finduser = Users::where('username', $user->email)->first();

            $_SESSION = [ 'u' => $user ];
            session(['gAccount' => $_SESSION['u']->user]);
            session(['gToken' => $_SESSION['u']->token]);
            // session(['gIdUser' => $finduser->id ]);

            if ( is_null($finduser) ){
                //create new account
                //dd("Create New Account");
                #/*
                try{
                    $newUser = Users::create([
                        'username' => $user->user['email'],
                        'firstname' => $user->user['given_name'],
                        'lastname' => $user->user['family_name'],
                        'g_id' => $user->id,
                        'token' => $user->token,
                        'role' => 'inovator',
                        'status' => '1'
                    ]);
                    Auth::login($finduser);
                    return redirect('sso')->with('msg', 'Akun baru berhasil dibuat');

                    // auth('web')->login($newUser);
                }catch(Exception $x){
                    return redirect('sso')->with('msg', $x);
                }
                // Auth::login($newUser);
                #*/
            }else{
                // if status=0 then login, if status=1 then another active login, flush !
                // $finduser = $finduser->toArray();
                // if($finduser['status']==0){
                if($finduser->status==0){
                    //update users set status active, last_in
                    Users::where('g_id', $user->id)
                        ->update(['last_in' => now(), 'status' => 1]);

                    // Auth::login($finduser, false);
                    // auth('web')->login($finduser);
                    // dd(Auth::user());

                    session(['gId' => $finduser->id]);

                    Auth::login($finduser);
                    return redirect('dashboard');
                }else{
                    // session_destroy();
                    Auth::logout();
                    Users::where('g_id', $user->id)
                        ->update(['status' => 0]);
                    return redirect('sso')->withErrors("Maaf, akun Anda sedang aktif di waktu dan tempat lain. Silahkan coba beberapa saat lagi !");
                }

            }
            // return redirect('/home');

        } catch (Exception $e) {
            return redirect('sso')->with('msg', $e->getMessage());
        }
    }
}
