<?php

namespace App\Http\Controllers;

use App\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TahunController extends Controller {

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
        // $this->validate($request, [
        //     'tahun' => 'required|max:4|min:4',
        // ]);

        $messages = [
            'tahun.required' => 'Tahun harus diisi !',
            'tahun.numeric' => 'Tahun hanya berupa angka !',
            'tahun.min' => 'Tahun mulai 2001',
            'tahun.max' => 'Tahun belum berjalan!',
            'tahun.digits' => 'Tahun terdiri dari 4 angka !',
        ];

        $validator = Validator::make($request->all(), [
            'tahun' => 'required|digits:4|integer|min:2000|max:'.(date('Y')+1),
        ], $messages);

        if ($validator->fails()) {
            return redirect('config/TahunAdd')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'tahun' => $request->tahun,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Tahun::insert($data);
        return view('config.TahunAdd');
    }

    public function showRegisterForm(){
        return view('config.TahunAdd');
    }

}
