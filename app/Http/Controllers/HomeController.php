<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Route;

use App\Models\Berita;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Tentangkami;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
       // dd('Some messsage here.'. $user);
        if (Route::has('login')){

            if (Auth::check()){
                if($user->status==0 || $user->status==2){
                    return view('home');
                }
                elseif ($user->status==1){
                    $beritas = Berita::latest()->limit(3)->offset(0)->get();
                    $tentang = Tentangkami::all();
                    $galeri = Galeri::latest()->limit(6)->offset(0)->get();
                    $arr['beritas']=$beritas;
                    $arr['tentang']=$tentang;
                    $arr['galeri']=$galeri;
                    return view('beranda',  $arr );
                }
            }
            else{
                //dd('Some messaage here.'. Auth::check());
                $beritas = Berita::latest()->limit(3)->offset(0)->get();
                $tentang = Tentangkami::all();
                $galeri = Galeri::latest()->limit(6)->offset(0)->get();
                return view('beranda',  compact('beritas', 'tentang','galeri') );
            }
        }
    }
}
