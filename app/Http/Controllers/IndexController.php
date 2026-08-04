<?php

namespace App\Http\Controllers;
// session_start();
use Illuminate\Http\Request;
use App\Http\SessionController;
use GuzzleHttp\Client;

class IndexController extends Controller {

    public function index(Request $request){
        if ( isset($_SESSION['u']) && null !== $request->session()->get('gToken') ) {
		    return redirect('home');
        }else{
            $_SESSION = null; session_destroy();

            //return view('login');
            return view('index', compact('request'));
        }

    }

    public function innovations(Request $request)
    {
        return view('innovations', compact('request'));
    }

    public function awards(Request $request)
    {
        return view('awards', compact('request'));
    }

    public function testimonials(Request $request)
    {
        return view('testimonials', compact('request'));
    }

    public function teams(Request $request)
    {
        return view('teams', compact('request'));
    }

}
