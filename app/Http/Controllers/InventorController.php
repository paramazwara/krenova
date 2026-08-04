<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Inventor;
use App\Pendidikan;
use App\Pekerjaan;
use App\Kategori;
use App\Tipe;
use App\Kecamatan;
use App\Kelurahan;
use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// session_start();
use App\Http\SessionController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DataTables;

class InventorController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function getInventors()
    {
        $tahun = date('Y');
        $s = "SELECT i.id, if(t.tipe='Kelompok', i.k_nama, i.p_nama) as inventor, status_inventor , concat(i.alamat, ' - ', kel.nama_kel, ' - ', kec.nama_kec) as alamat, ".
                "k.kategori, t.tipe, i.telepon as cp ".
                "FROM inventor i left join t_kelurahan kel on i.id_kel = kel.id ".
                "left join t_kecamatan kec on i.id_kec = kec.id left join pekerjaan pkj on i.p_pekerjaan = pkj.id ".
                "left join pendidikan pdk on i.p_pendidikan = pdk.id left join kategori k on k.id = i.kategori ".
                "left join tipe t on t.id = i.tipe";

        $data = DB::select(DB::raw($s));
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                $actionBtn =    '<a href="/inventorEdit/' . $row->id . '" data-id="' . $row->id .
                                    '" class="edit-inventor btn icon-link btn-success btn-sm rounded-pill" alt="Ubah" '.
                                    'title="Ubah data inventor ' . $row->inventor. '"><i class="bi bi-pencil-square"></i> Ubah</a> '.

                                '<a href="#mConfirmDel" data-id="' . $row->id .
                                    '" class="delete-inventor btn btn-danger btn-sm rounded-pill" alt="Hapus" data-toggle="modal" '.
                                    'title="Hapus data inventor ' . $row->inventor. '"><i class="bi bi-trash"></i> Hapus</a>';

                // $actionBtn .= '<button type="submit" data-id="' . $row->id . '" class="edit-inventor btn icon-link btn-success btn-sm rounded-pill" data-toggle="modal" data-target="#frmUbahInventor"><i class="bi bi-pencil-square"></i> Ubah</button>';

                return $actionBtn;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function getInventorById(Request $request, string $id)
    {
        $inventor = Inventor::where('id', $id)->get();
        dd($inventor->toArray());
    }

    public function inventorAdd(Request $request){

        $pendidikan = Pendidikan::all();
        $pendidikan = $pendidikan->toArray();

        $pekerjaan = Pekerjaan::all();
        $pekerjaan = $pekerjaan->toArray();

        $kecamatan = Kecamatan::all();
        $kecamatan = $kecamatan->toArray();

        $kelurahan = Kelurahan::all();
        $kelurahan = $kelurahan->toArray();

        $kategori = Kategori::where('status', '=', 1)->get();
        $kategori = $kategori->toArray();
        $tipe = Tipe::where('status', '=', 1)->get();
        $tipe = $tipe->toArray();

        return view('admin.adm_inventor_add', compact('request', 'pendidikan', 'pekerjaan', 'kategori', 'tipe', 'kecamatan', 'kelurahan'));
    }

    public function inventorEdit(Request $request, $id){
        $pendidikan = Pendidikan::all();
        $pendidikan = $pendidikan->toArray();

        // $pekerjaan = Pekerjaan::all();
        $pekerjaan = Pekerjaan::where('status',1)->orderBy('nama')->get();
        $pekerjaan = $pekerjaan->toArray();

        $kecamatan = Kecamatan::all();
        $kecamatan = $kecamatan->toArray();

        $kelurahan = Kelurahan::all();
        $kelurahan = $kelurahan->toArray();

        $kategori = Kategori::where('status', '=', 1)->get();
        $kategori = $kategori->toArray();
        $tipe = Tipe::where('status', '=', 1)->get();
        $tipe = $tipe->toArray();

        $inventor = Inventor::where('id', $id)->get();
        $inventor = $inventor->toArray();

        return view('admin.adm_inventor_edt', compact('request', 'kategori', 'tipe', 'pekerjaan', 'pendidikan', 'kecamatan', 'kelurahan', 'inventor'));
    }

    public function index(Request $request)
    {
        try{
            $this->account = $request->session()->get('gAccount');
            $this->user = Users::where('g_id', $this->account['id'])->first();

            if($this->user==null){
                return redirect('sso')->with('msg', "Silahkan masuk terlebih dahulu");
            };

            switch($this->user->role){
                case "admin":
                    $useractive = $this->user;
                    $inventor = Inventor::all();
                    return view('admin.adm_inventor', compact('request', 'useractive', 'inventor'));
                    break;
                case "operator":
                    break;
                case "juri":
                    break;
                default:
                    $inventor = Inventor::where('id_user', $this->user['id'])->get();
                    $inventor = $inventor->toArray();

                    $pendidikan = Pendidikan::all();
                    $pendidikan = $pendidikan->toArray();

                    $pekerjaan = Pekerjaan::all();
                    $pekerjaan = $pekerjaan->toArray();

                    $kecamatan = Kecamatan::all();
                    $kecamatan = $kecamatan->toArray();

                    $kelurahan = Kelurahan::all();
                    $kelurahan = $kelurahan->toArray();

                    $kategori = Kategori::where('status', '=', 1)->get();
                    $kategori = $kategori->toArray();
                    $tipe = Tipe::where('status', '=', 1)->get();
                    $tipe = $tipe->toArray();

                    return view('inventor', compact('request', 'inventor', 'pendidikan', 'pekerjaan', 'kategori', 'tipe', 'kecamatan', 'kelurahan'));
            }

        } catch (Exception $e) {
            return redirect('sso')->with('msg', $e->getMessage());
        }
    }

    public function store(Request $request) {

        $v = Validator::make($request->all(), [
            'i_kategori' => 'required',
            'i_tipe' => 'required'
        ]);

        if ($request->i_tipe==0){
            $tipeLomba[0]['tipe'] = "";
        }else{
            $tipeLomba = Tipe::where('id', '=', $request->i_tipe)->get();
            $tipeLomba = $tipeLomba->toArray();
        }

        if ( strtolower($tipeLomba[0]['tipe']) == "perseorangan"){
            $v = Validator::make($request->all(), [
                'i_nik' => 'required|digits:16',
                'i_nama' => 'required|min:5|max:255',
                'i_pekerjaan' => 'required',
                'i_pendidikan' => 'required',
                'i_fotoktp' => 'image|mimes:jpeg,jpg,png,gif|max:2048',

                'i_telp' => 'required|string|min:10|max:16',
                'i_alamat' => 'required|min:5|max:255',
            ],
            [
                'i_nik.required' => 'NIK/NIS belum diisi',

                'i_nama.required' => 'Nama belum diisi',
                'i_nama.min' => 'Nama minimal diisi 5 karakter',
                'i_nama.max' => 'Nama minimal diisi 5 karakter',

                'i_pekerjaan.required' => 'Pekerjaan belum dipilih',
                'i_pendidikan.required' => 'Pendidikan belum dipilih',

                // 'i_fotoktp.required' => 'Foto Kartu Identitas belum ada',
                'i_fotoktp.image' => 'Foto Kartu Identitas harus berupa gambar',
                'i_fotoktp.mimes' => 'Foto Kartu Identitas hanya menerima :jpeg,jpg,png,gif',
                'i_fotoktp.max' => 'Foto Kartu Identitas maks. 2MB',

                'i_telp.required' => 'Nomor telepon belum diisi',
                'i_telp.min' => 'Masukkan nomor telepon dengan benar',
                'i_telp.max' => 'Masukkan nomor telepon dengan benar',

                'i_alamat.required' => 'Alamat belum diisi',
            ]);

            // dd($request->all());

        }elseif (strtolower($tipeLomba[0]['tipe']) == "kelompok") {
            $v = Validator::make($request->all(), [

                'i_telp' => 'required|string|min:10|max:16',
                'i_alamat' => 'required|min:5|max:255',
                'i_fotoselfie' => 'image|mimes:jpeg,jpg,png,gif|max:2048',

                'k_nama' => 'required|string|min:5',
                'k_lembaga' => 'required|string|min:5',
                'k_ketua' => 'required|string|min:5',
                'k_anggota1' => 'required|string|min:5',
            ],
            [
                'i_telp.required' => 'Nomor telepon belum diisi',
                'i_telp.min' => 'Masukkan nomor telepon dengan benar',
                'i_telp.max' => 'Masukkan nomor telepon dengan benar',

                'i_alamat.required' => 'Alamat belum diisi',

                'i_fotoselfie.image' => 'Foto Diri / Kelompok harus berupa gambar',
                'i_fotoselfie.mimes' => 'Foto Diri / Kelompok hanya menerima :jpeg,jpg,png,gif',
                'i_fotoselfie.max' => 'Foto Diri / Kelompok maks. 2MB',

                'k_nama.required' => 'Nama Kelompok minimal diisi 5 karakter',
                'k_nama.min' => 'Nama Kelompok minimal diisi 5 karakter',

                'k_lembaga.required' => 'Nama Lembaga minimal diisi 5 karakter',
                'k_lembaga.min' => 'Nama Lembaga minimal diisi 5 karakter',

                'k_ketua.required' => 'Nama Ketua minimal diisi 5 karakter',
                'k_ketua.min' => 'Nama Ketua minimal diisi 5 karakter',

                'k_anggota1.required' => 'Anggota kelompok minimal 2 orang (Ketua & 1 Anggota)',
                'k_anggota1.min' => 'Nama Anggota 1 minimal diisi 5 karakter',

            ]);
            // dd($request->all());

        }else{
            return redirect()->back()->withErrors(trans('Pilih Kategori Lomba dan Tipe yang diinginkan !'));
        }

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all())->withInput();
        }

        $this->account = $request->session()->get('gAccount');
        $this->user = Users::where('g_id', $this->account['id'])->first();

        $inventor = Inventor::where('id_user', $this->user['id'])->get();
        $inventor = $inventor->toArray();

        //dd($this->user->id);

        if ($request->file('i_fotoktp')){
            $foto = $request->file('i_fotoktp');
            $fotoKtp = $foto->getClientOriginalName();
            File::delete(public_path('images\\idcard\\') . $request->i_oldktp);
            $foto->move(public_path('images\\idcard'), $fotoKtp);
        }else{
            if ($request->i_oldktp == "" && isset($inventor[0]['foto_ktp'])){
                $fotoKtp = "";
                File::delete(public_path('images\\idcard\\') . $inventor[0]['foto_ktp']);
            }else{
                $fotoKtp = $request->i_oldktp;
            }
        }

        // if ($request->i_oldktp != $inventor[0]['foto_ktp']) File::delete(public_path('images\\') . $request->i_oldktp);

        if ($request->file('i_fotoselfie')){
            $fotos = $request->file('i_fotoselfie');
            $fotoSelfie = $fotos->getClientOriginalName();
            File::delete(public_path('images\\selfie\\') . $inventor[0]['foto_diri']);
            $fotos->move(public_path('images\\selfie'), $fotoSelfie);
        }else{
            if ($request->i_oldselfie===""){
                $fotoSelfie = "";
                File::delete(public_path('images\\selfie\\') . $inventor[0]['foto_diri']);
            }else{
                $fotoSelfie = $request->i_oldselfie;
            }
        }

        // if ($request->i_oldselfie != $inventor[0]['foto_diri']) File::delete(public_path('images\\') . $request->i_oldselfie);

        if ( $this->user->role ==="admin" ){

            if ($request->i_save==="update"){
                Inventor::where('id', $request->i_id)->update([
                    'kategori' => $request->i_kategori,
                    'tipe' => $request->i_tipe,
                    'p_nik' => $request->i_nik,
                    'p_nama'  => $request->i_nama,
                    'telepon'  => $request->i_telp,
                    'alamat'  => $request->i_alamat,
                    'id_kel'  => $request->i_kelurahan,
                    'id_kec'  => $request->i_kecamatan,
                    'p_foto_ktp' => $fotoKtp,
                    'foto_diri' => $fotoSelfie,
                    'p_pekerjaan'  => $request->i_pekerjaan,
                    'p_pendidikan'  => $request->i_pendidikan,
                    'k_nama'  => $request->k_nama,
                    'k_lembaga'  => $request->k_lembaga,
                    'k_ketua'  => $request->k_ketua,
                    'k_anggota1'  => $request->k_anggota1,
                    'k_anggota2'  => $request->k_anggota2,
                    'k_anggota3'  => $request->k_anggota3,
                    'k_anggota4'  => $request->k_anggota4
                ]);

                $response = "Data Inventor berhasil diperbarui !";
            }else{
                Inventor::create([
                    'id_user' => $this->user->id,
                    'kategori' => $request->i_kategori,
                    'tipe' => $request->i_tipe,
                    'p_nik' => $request->i_nik,
                    'p_nama'  => $request->i_nama,
                    'telepon'  => $request->i_telp,
                    'alamat'  => $request->i_alamat,
                    'id_kel'  => $request->i_kelurahan,
                    'id_kec'  => $request->i_kecamatan,
                    'p_foto_ktp' => $fotoKtp,
                    'foto_diri' => $fotoSelfie,
                    'p_pekerjaan'  => $request->i_pekerjaan,
                    'p_pendidikan'  => $request->i_pendidikan,
                    'k_nama'  => $request->k_nama,
                    'k_lembaga'  => $request->k_lembaga,
                    'k_ketua'  => $request->k_ketua,
                    'k_anggota1'  => $request->k_anggota1,
                    'k_anggota2'  => $request->k_anggota2,
                    'k_anggota3'  => $request->k_anggota3,
                    'k_anggota4'  => $request->k_anggota4
                ]);
                $response = "Data Inventor baru berhasil ditambahkan !";
            }
            $response .= ($request->i_nama) ? $request->i_nama : $request->k_nama;
            return redirect()->route("inventor")->with('inventorSaved', $response);

        }else if ( $this->user->role ==="inovator" ){
            $inventor = Inventor::where('id_user', $this->user['id'])->update([
                'kategori' => $request->i_kategori,
                'tipe' => $request->i_tipe,
                'p_nik' => $request->i_nik,
                'p_nama'  => $request->i_nama,
                'telepon'  => $request->i_telp,
                'alamat'  => $request->i_alamat,
                'id_kel'  => $request->i_kelurahan,
                'id_kec'  => $request->i_kecamatan,
                'p_foto_ktp' => $fotoKtp,
                'foto_diri' => $fotoSelfie,
                'p_pekerjaan'  => $request->i_pekerjaan,
                'p_pendidikan'  => $request->i_pendidikan,
                'k_nama'  => $request->k_nama,
                'k_lembaga'  => $request->k_lembaga,
                'k_ketua'  => $request->k_ketua,
                'k_anggota1'  => $request->k_anggota1,
                'k_anggota2'  => $request->k_anggota2,
                'k_anggota3'  => $request->k_anggota3,
                'k_anggota4'  => $request->k_anggota4
            ]);


            //dd($inventor);

            $response = "Data Profil Inventor berhasil disimpan";
            return redirect()->back()->with('inventor', $response);
        }
    }

    public function approval(Request $request, string $approval, string $id){
        //update status inventor
        switch($approval){
            case "reject":
                $status = "ditolak";
                break;
            case "revise":
                $status = "perlu perbaikan";
                break;
            case "validate":
                $status = "diterima";
                break;
            default:
                $status = "belum validasi";
                break;

        }
        Inventor::findOrFail($id)->update([
            'status_inventor'  => $status
        ]);

        /*
        History::create([
            'id_table'      => $id,
            'table_name'    => "inventor",
            'id_user'       => ($request->session()->only(['gId']))['gId'],
            'action'        => "$approval data inventor"
        ]);
        */

        //rejected. send notif for user via email ?
        return response()->json(array('result'=> "Data Inventor $status"), 200);
    }

    public function reject(Request $request) {
        return response()->json(
            array(
                'request '=> $request,
                'result '=> "DITOLAK"
                ), 200);
    }

}
