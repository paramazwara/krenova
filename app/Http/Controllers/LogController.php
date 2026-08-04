<?php

namespace App\Http\Controllers;

use App\LogErrors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [
            'action' => $request->action,
            'errors' => $request->errors,
            'user' => $request->user
        ];
        LogErrors::insert($data);
    }

}
