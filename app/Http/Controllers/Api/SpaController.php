<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Inventor;
use App\Inovasi;
use App\Kategori;
use App\Kelurahan;
use App\Kecamatan;
use App\Pekerjaan;
use App\Pendidikan;
use App\Tipe;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpaController extends Controller
{
    private function user(Request $request)
    {
        $account = $request->session()->get('gAccount');
        return $account && !empty($account['id']) ? Users::where('g_id', $account['id'])->first() : null;
    }

    public function me(Request $request)
    {
        $user = $this->user($request);
        return response()->json(['authenticated' => (bool) $user, 'user' => $user ? $user->only(['id', 'nama', 'email', 'role']) : null]);
    }

    public function options()
    {
        return response()->json([
            'kategori' => Kategori::where('status', 1)->orderBy('nama')->get(),
            'tipe' => Tipe::where('status', 1)->orderBy('tipe')->get(),
            'pendidikan' => Pendidikan::orderBy('nama')->get(),
            'pekerjaan' => Pekerjaan::where('status', 1)->orderBy('nama')->get(),
            'kecamatan' => Kecamatan::orderBy('nama_kec')->get(),
        ]);
    }

    public function kelurahan($kecamatanId)
    {
        return Kelurahan::where('id_kec', $kecamatanId)->orderBy('nama_kel')->get();
    }

    public function inventor(Request $request)
    {
        $user = $this->user($request);
        if (!$user) abort(401);
        return Inventor::where('id_user', $user->id)->first();
    }

    public function saveInventor(Request $request)
    {
        $user = $this->user($request);
        if (!$user) abort(401);
        $validator = Validator::make($request->all(), [
            'kategori' => 'required|exists:kategori,id', 'tipe' => 'required|exists:tipe,id',
            'telepon' => 'required|string|min:10|max:16', 'alamat' => 'required|string|min:5|max:255',
            'id_kec' => 'required|exists:t_kecamatan,id', 'id_kel' => 'required|exists:t_kelurahan,id',
        ]);
        if ($validator->fails()) return response()->json(['message' => 'Validasi gagal.', 'errors' => $validator->errors()], 422);
        $inventor = Inventor::firstOrNew(['id_user' => $user->id]);
        $inventor->fill($request->only(['kategori', 'tipe', 'p_nik', 'p_nama', 'telepon', 'alamat', 'id_kel', 'id_kec', 'p_pekerjaan', 'p_pendidikan', 'k_lembaga', 'k_nama', 'k_ketua', 'k_anggota1', 'k_anggota2', 'k_anggota3', 'k_anggota4']));
        $inventor->save();
        return response()->json(['message' => 'Profil inventor tersimpan.', 'data' => $inventor]);
    }

    public function innovations()
    {
        return Inovasi::query()->orderByDesc('updated_at')->paginate(12);
    }
}