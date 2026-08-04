<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request){
        if ( null != $request->session()->get('gToken') ){
            //goto dashboard
        }else{
            //goto login
        }
    }
}
