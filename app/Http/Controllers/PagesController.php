<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use App\Models\Berita;
use App\Models\Kejuaraan;
use App\Models\Tentangkami;
use App\Models\Galeri;
use App\Models\Event;

use Auth;
use DB;
use Route;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

/*CONTROLLER INI DIPAKE KHUSUS UNTUK UMUM YAITU USER YG GAPUNYA AKUN*/

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }


    public function index()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function berita()
    {
        $beritas = Berita::latest()->limit(10)->offset(0)->get();
        return view('pages.unberita', ['beritas' => $beritas]);
    }

    public function beritadetail($idberita)
    {
        $beritas = Berita::join('users','beritas.id_user','=', 'users.id')->where('beritas.id','=',$idberita)->get();
        $komentars = Berita::join('komentars', 'beritas.id', '=', 'komentars.id_berita')->join('users','komentars.id_user','=','users.id')->where('komentars.id_berita','=',$idberita)->where('komentars.status','=','1')->get();
        return view ('pages.unberitadetail', ['beritas' => $beritas, 'komentars' => $komentars]);
    }

    public function kejuaraan(){
        $kejuaraans = Kejuaraan::latest()->limit(5)->offset(0)->get();
        return view('pages.unkejuaraan', ['kejuaraans' => $kejuaraans]);
    }

    public function galeri(){
        $event = Event::latest()->get();
        return view('galeri.index', ['events' => $event]);
    }

    public function galeridetail($idevent)
    {
        $galeris = Galeri::join('events','galeris.id_event','=','events.idevent')->where('galeris.id_event','=',$idevent)->get();
        return view ('galeri.showalbum', ['galeris' => $galeris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
