<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use App\Http\SessionController;

class LoginController extends Controller {

    public function login(Request $request){

        if ( isset($_SESSION['u']) && null !== $request->session()->get('gToken') ) {
        // if ( $request->session()->has('gToken') && $request->session()->has('gAccount') ) {
            //dump('hai..');
            //return view('home');
            return redirect('dashboard');
            //$request->session()->flush();
        }else{
            $_SESSION = null; session_destroy();
            return view('login');
            #return view('index');
        }

    }
}
