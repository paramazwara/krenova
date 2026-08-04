<?php

namespace App\Http\Controllers;

use App\Users;
use App\Inventor;
use App\Inovasi;
use App\Tahun;
use App\Kategori;
use App\Tipe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// session_start();
use App\Http\SessionController;
use DataTables;

class InovasiController extends Controller {

    public $token;

    public function getInovasiByInventor()
    {
        // if(\request()->ajax()){
            // $data = Inovasi::all();
            // return DataTables::of($data)
            //     ->addIndexColumn()
            //     ->addColumn('action', function($row){
            //         $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
            //         return $actionBtn;
            //     })
            //     ->rawColumns(['action'])
            //     ->make(true);
        // }
        // return view('inovasi');

        $tahun = date('Y');

        $s = "SELECT inovasi.id, inovasi.nama_inovasi, ist.teks, t.tahun ".
                "FROM inovasi JOIN inventor i ON inovasi.id_inventor=i.id ".
                "JOIN inovasi_status ist ON inovasi.inovasi_status=ist.id ".
                "JOIN tahun t ON inovasi.id_tahun = t.id WHERE t.tahun='{$tahun}' AND inovasi_status < 5";
        $data = DB::select(DB::raw($s));
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn =    '<a href="#" data-id="' . $row->id . '" class="edit btn icon-link btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> '.
                                '<a href="#" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index(Request $request)
    {
        $this->account = $request->session()->get('gAccount');
        $this->user = Users::where('g_id', $this->account['id'])->first();

        if($this->user==null){
            return redirect('sso')->with('msg', "Silahkan masuk terlebih dahulu");
        };

        $this->token = $this->account['id'];

        $inventor = Inventor::where('id_user', $this->user['id'])->get();
        $inventor = $inventor->toArray();

        $kategori = Kategori::where('status', '=', 1)->get();
        $kategori = $kategori->toArray();

        $tipe = Tipe::where('status', '=', 1)->get();
        $tipe = $tipe->toArray();

        return view('inovasi', compact('request', 'inventor', 'kategori', 'tipe'));
    }

    public function delete(Request $request, $id){
        $this->account = $request->session()->get('gAccount');
        $this->user = Users::where('g_id', $this->account['id'])->first();
        if($this->user==null){
            return redirect('sso')->with('msg', "Silahkan masuk terlebih dahulu");
        };


        // $inovasi = Inovasi::where('id', $id)->update([
        //     'inovasi_status'  => 5
        // ]);

        return response()->json(['msg' => "Data inovasi berhasil dihapus"], 200);
    }

}
