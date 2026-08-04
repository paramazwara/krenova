<?php

namespace App\Http\Controllers;

use Auth;
use App\Users;
use App\Inventor;
use App\Inovasi;
use App\Pendidikan;
use App\Pekerjaan;
use Illuminate\Http\Request;
// session_start();

use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $account, $user;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ( $request->session()->get('gToken') !== null ) {

            // session_destroy();
            //cek users, if exist then goto dashboard. if not exist then auto register

            $this->account = $request->session()->get('gAccount');

            $this->user = Users::where('g_id', $this->account['id'])
                                ->first();

            if ( $this->user == null ){
                //register
                // session_destroy();
                Auth::logout();
                $request->session()->flush();
                return redirect('sso')->withErrors('Maaf, akun Google tidak dikenali. Silahkan hubungi tim krenova !');
            }

            $_USER = $this->user->toArray();

            if ( $_USER['status'] == 4 ){
                // session_destroy();
                Auth::logout();
                $request->session()->flush();
                return redirect('sso')->withErrors('Maaf, akun Anda diblokir. Silahkan hubungi Tim Krenova');
            }

            //check privileges

            switch($_USER['role']){
                case "admin":
                    $useractive = $this->user;
                    $inventor = "";
                    $inovasi = "";
                    return view('admin.adm_dashboard', compact('request', 'useractive', 'inventor', 'inovasi'));
                    break;
                case "operator":
                    dd("hi there, operator!");
                    break;
                case "juri":
                    dd("hello, judges..");
                    break;
                default:
                    //inventor

                    $dataInventor = Inventor::where('id_user', $this->user['id'])->get();

                    foreach($dataInventor as $id=>$inventor){

                        $persenInventor = 0; $countInventor = 0; $persenInventorBg = "";
                        if ( sizeof($inventor->toArray() ) < 1 ) {
                            $inventor = array('nama'=>'?', 'nik'=>'');;
                        }else{
                            $inventor = $inventor->toArray();
                            foreach ($inventor as $ik => $iv) {
                                if ($inventor['tipe']=='1'){ //perseorangan
                                    if (substr($ik, 0, 2) != "k_"){
                                        $countInventor++;
                                        if ($iv!="") $persenInventor++;
                                    }
                                }
                                if ($inventor['tipe']=='2'){ //kelompok
                                    if (substr($ik, 0, 2) != "p_"){
                                        $countInventor++;
                                        if ($iv!="") $persenInventor++;
                                    }
                                }
                            }
                        }

                        $persenInventor = ($persenInventor<1) ? 1 : round($persenInventor / $countInventor * 100, 0);
                        switch ($persenInventor) {
                            case $persenInventor<50:
                                $persenInventorBg = "bg-danger";
                                break;
                            case $persenInventor<80:
                                $persenInventorBg = "bg-warning";
                                break;
                            case $persenInventor<100:
                                $persenInventorBg = "bg-primary";
                                break;
                            case $persenInventor==100:
                                $persenInventorBg = "bg-success";
                                break;
                            default:
                                $persenInventorBg = "bg-danger";
                                break;
                        }

                        $inovasi = Inovasi::where('id_inventor', $inventor['id'])->get();
                        $inovasi = $inovasi->toArray();
                        // dd($inovasi);

                        array_push($inventor, ["persenInventor" => $persenInventor] );

                        $persenInovasi = 0;

                    }

                    $useractive = $this->user;
                    return view('home', compact('request', 'useractive', 'inventor', 'persenInventor', 'persenInventorBg', 'inovasi', 'persenInovasi'));
                    break;

            }


            /*
            $this->user = Users::select('users.*')
                                ->where('g_id', $this->account['id'])
                                ->where('status', '0')
                                ->get();
            // */




        }else{
            #session_destroy();
            return redirect('index');

	/*
            $client = new Client();
            $response = $client->get("https://rkpd.salatiga.go.id/wp-json/wp/v2/posts/302");
            $p = json_decode($response->getBody());
            return view('index', compact('request', 'p'));
	*/

        }
    }

    public function about(Request $request){
    	return view('about');
    }

    public function home(Request $request){

    	return view('index', compact('request'));
    }

    public function logout(Request $request){
        try{
            if ( isset($_SESSION['u']) || null !== $request->session()->get('gToken') ) {
                Users::where('g_id', $request->session()->only(['gId']))->update( ['status' => 0]  );
                // Users::where('g_id', $user->id)->update(['last_in' => now(), 'status' => 1]);
            }
        }catch(Exception $e){
            echo "ERR: " . $e->getMessage();
        }finally{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $request->session()->flush();
            return redirect('/sso');
        }
    }
}
