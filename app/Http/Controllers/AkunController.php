<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use App\Models\Berita;
use App\Models\Kejuaraan;
use App\Models\Info;
use App\Models\Galeri;

use Auth;
use DB;
use Route;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;
use App\Http\Requests\KomentarFormRequest;
use App\Http\Requests\InfoFormRequest;
use App\Models\Event;

class AkunController extends Controller
{

    /*INI CODE MIDDLEWARE, ARTINYA CONTROLLER INI KHUSUS USER YG PUNYA AKUN*/
    public function __construct()
    {
        //$this->middleware('akun');
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
        return view('akun.eberita', ['beritas' => $beritas]);
    }

    public function beritadetail($idberita)
    {
        $beritas = Berita::where('beritas.id','=',$idberita)->get();
        $komentars = Berita::join('komentars', 'beritas.id', '=', 'komentars.id_berita')->join('users','komentars.id_user','=','users.id')->where('komentars.id_berita','=',$idberita)->where('komentars.status','=','1')->get();
        return view ('akun.eberitadetail', ['beritas' => $beritas, 'komentars' => $komentars]);
    }

    public function kejuaraan(){
        $kejuaraans = Kejuaraan::latest()->limit(5)->offset(0)->get();
        return view('akun.ekejuaraan', ['kejuaraans' => $kejuaraans]);
    }
    public function informasi(){
        $infos = Info::all();
        return view('akun.einformasi', ['infos' => $infos]);
    }

    public function galeri(){
        // $galeris = Galeri::latest()->get();
        // return view('galeri.index', ['galeris' => $galeris]);
        $event = Event::latest()->get();
        return view('akun.egaleri', ['events' => $event]);
    }
    public function galeridetail($idevent)
    {
        $galeris = Galeri::join('events','galeris.id_event','=','events.idevent')->where('galeris.id_event','=',$idevent)->get();
        return view ('akun.egaleridetail', ['galeris' => $galeris]);
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
     * @param  InfoFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpaninfo(InfoFormRequest $request)
    {
        $nama = $request->get('nama');
        $keterangan = $request->get('editor1');
        $id_user = $request->get('penulis');

        $info = new Info();

        $info->nama= $nama;
        $info->keterangan= $keterangan;
        $info->id_user= $id_user;

        $doc       = $request->file('formulir');
        $docx      = $doc->getClientOriginalName();
        $dext      = $doc->getClientOriginalExtension();
        $docName   = rand(100000,1001238912).".".$dext;

        if ($dext == 'docx') {
           $request->file('formulir')->move("info/", $docName);
           $info->doc= $docName;
        }
        else{
           return redirect('einformasi')->with('statussalah', 'Detail Informasi Harus Format File Word (.docx)');
        }

        $file       = $request->file('foto');
        $filex      = $file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();
        $fileName   = rand(100000,1001238912).".".$ext;

        $request->file('foto')->move("info/foto/", $fileName);
        $info->foto= $fileName;

        $info->save();

        return redirect('einformasi')->with('status', 'Informasi telah berhasil ditambahkan. Terima Kasih');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  KomentarFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpankomen(KomentarFormRequest $request)
    {
        $komen = $request->get('komentar');
        $id_berita = $request->get('id_berita');
        $id_user = $request->get('id_user');

        $komentar = new Komentar();

        $komentar->komentar= $komen;
        $komentar->status= 0;
        $komentar->id_user= $id_user;
        $komentar->id_berita= $id_berita;

        $komentar->save();

        return redirect('/');
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
