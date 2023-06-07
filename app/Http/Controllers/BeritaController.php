<?php

namespace App\Http\Controllers;

use App\Models\Berita;

use Auth;
use Route;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\BeritaFormRequest;

class BeritaController extends Controller
{
    /*INI CODE MIDDLEWARE, ARTINYA CONTROLLER INI KHUSUS ADMIN*/
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*INI AMBIL DATA BERITA DI DB BUAT DITAMPILIN DI VIEW PAKE TABLE YG ADA HLM NYA*/
        $beritas = Berita::latest()->limit(10)->offset(0)->get();
        
        $totalBerita = Berita::all();
        $total = count($totalBerita);
        $hlm = ceil($total/10);

        return view('admin.berita.index', ['beritas' => $beritas, 'hlm' => $hlm]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BeritaFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeritaFormRequest $request)
    {
        $berita = new Berita();

        $berita->judul      = $request->get('judul');
        $berita->deskripsi  = $request->get('deskripsi');
        $berita->isi        = $request->get('editor1');
        $berita->id_user    = $request->get('penulis');

        $file       = $request->file('foto');
        if($file != ''){
            $filex      = $file->getClientOriginalName();
            $ext        = $file->getClientOriginalExtension();
            $fileName   = rand(100000,1001238912).".".$ext;

            $request->file('foto')->move("foto/berita/", $fileName);
            $berita->foto= $fileName;
        }

        $berita->save();

        return redirect('berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beritas = Berita::whereId($id)->firstOrFail();
        return view('admin.berita.edit',['beritas' => $beritas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BeritaFormRequest  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(BeritaFormRequest $request, $id)
    {
        $berita = Berita::whereId($id)->firstOrFail();

        $berita->judul      =$request->get('judul');
        $berita->deskripsi  =$request->get('deskripsi');
        $berita->isi        =$request->get('editor1');
        $berita->id_user    =$request->get('penulis');

        if (empty($request->file('foto'))){
            $berita->foto = $berita->foto;
        }
        else{
            unlink("foto/berita/".$berita->foto); //menghapus file lama
            $file       = $request->file('foto');
            $filex      = $file->getClientOriginalName();
            $ext        = $file->getClientOriginalExtension();
            $fileName   = rand(100000,1001238912).".".$ext;

            $request->file('foto')->move("foto/berita/", $fileName);
            $berita->foto= $fileName;
        }

        $berita->save();
        return redirect(action('BeritaController@edit', $berita->id))->with('status', 'berita dengan id '.$berita->id.' telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komentar= DB::select(DB::raw("DELETE FROM komentars where id_berita=$id"));

        $berita = Berita::whereId($id)->firstOrFail();
        $berita->delete();
        return redirect('berita')->with('status', 'Data Berita dan Komentar yang dimuat dengan judul '.$berita->judul.' telah berhasil dihapus');
    }
}
