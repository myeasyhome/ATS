<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Auth;
use App\User;

use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use Cookie;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        // $client = new Client([
        //     'headers' => ['Accept' => 'application/json'],
        // ]);

        // // set array
        // $data = array(
        //     'username' => $request->nik,
        //     'password' => $request->password 
        // );

        // // VALIDASI LOGIN
        // $req = $client->requestAsync('POST','https://appsorientasi.indosatooredoo.com/dev/apiuser/loginLDAP3', [
        //     'http_errors' => false,
        //     'form_params' => $data
        // ]);

        // $res = $req->then(function ($response) {
        //     if($response->getStatusCode() == 200) {
        //         $res = json_decode($response->getBody(), true);
        //         // Cookie::queue('access_token', $res['access_token'], 60);
        //         // Cookie::queue('role', 'user', 60);
        //         if ($res['status'] == 'binggo') {
        //             return [
        //                 'nik' => $res['Nik']
        //             ];
        //         }
        //     }else{
        //         dd('jgn');
        //         return false;
        //     }
        // })->wait();

        // if ($res) {
        //     dd('MASUK PAK EKOOO');
        //     if( Auth::attempt(['nik'=>$res['nik'], 'password'=>''])) {
        //         dd('masuk');
        //     } else {
        //         dd('gagal cuy');
        //     }
        //     dd('masuk',$res['nik']);
        //     return redirect()->route('ticket');
        // } else {
        //     return Redirect::back()->with('error','Your Username or Password is Invalid!!');
        // }


        if(Auth::attempt(['nik'=>$request->nik, 'password'=>$request->password])) {
            
            /* BUAT DEMO */
            $group = Auth::user()->group;
            $grade = Auth::user()->grade;
            $name = Auth::user()->name;

            if( $name == 'MONA BINILANG' || $name == 'GENNY' ) { 
                /*contoh user RECRUITER*/
                return redirect()->route('hrt.dashboard');
            } elseif( $grade == 6 && $group == 'Group HR Development' && $name == 'ASHIELA ANGGIANA PUTRI' ) {
                return redirect()->route('hrt.dashboard');
            } elseif( $grade == 6 && $group == 'Group HR Business Partner') {
                return redirect()->route('hrbp.list');
            } elseif( Auth::user()->grade < 7 ) {
                return back()->with('error','Your Permission is Denied !!');
            } elseif( $grade == 8 ) {
                // return redirect()->route('gh.list');
                return redirect()->route('ticket');
            } elseif( $grade == 9 ) {
                // return redirect()->route('chief.list');
                return redirect()->route('ticket');
            } elseif( Auth::user()->grade <= 9 ) {

                /* hrta */
                if ( $group == 'Group HR Development' && $grade <= 8 ) {
                    return redirect()->route('hrt.dashboard');
                } elseif ( $group == 'Group HR Business Partner' && $grade == 7 ) {
                    return redirect()->route('ticket');
                } else {
                    return redirect()->route('ticket');
                }
                
            } else {
                /* jika diatas 6 */
                dd('wew');
                return redirect()->route('ticket');
            }

        } else {
            /* untuk demo agar password ke hash */
            $a = User::where('nik',$request->nik)->first();
            $a->password = bcrypt($request->password);
            $a->save();
            /*--*/
            return back()->with('error','Your Username or Password is Invalid!');
        }
    }

    public function logout() {
        Auth::logout();
        return view('auth.login');
    }
}
