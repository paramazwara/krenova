<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KelurahanController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getKelByKec($id){
        #$kelurahan = Kelurahan::where('id_kec', $id)->get();
        $kelurahan = DB::table('t_kelurahan')
                        ->select(DB::raw('id, nama_kel'))
                        ->where('id_kec', '=', $id)
                        ->get();
        $kelurahan = $kelurahan->toArray();
        return $kelurahan;
    }

}
