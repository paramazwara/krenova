<?php

namespace App\Http\Controllers;

use App\Users;
use App\Inventor;
use App\Pendidikan;
use App\Pekerjaan;
use Illuminate\Http\Request;
// session_start();
use App\Http\SessionController;

class KuesionerController extends Controller {

    public function index(Request $request)
    {
        $this->account = $request->session()->get('gAccount');
        $this->user = Users::where('g_id', $this->account['id'])->first();

        $inventor = Inventor::where('id_user', $this->user['id'])->get();
        $inventor = $inventor->toArray();

        $pendidikan = Pendidikan::all();
        $pendidikan = $pendidikan->toArray();

        $pekerjaan = Pekerjaan::all();
        $pekerjaan = $pekerjaan->toArray();

        return view('kuesioner', compact('request', 'inventor', 'pendidikan', 'pekerjaan'));
    }

}
