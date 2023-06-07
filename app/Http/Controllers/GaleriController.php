<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

use App\Http\Requests\GaleriFormRequest;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', ['galeris' => $galeris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeri = new Galeri();

        $galeri->judul      = $request->get('judul');
        $galeri->ket        = $request->get('ket');
        $galeri->id_user    = $request->get('penulis');
        $galeri->status    = $request->get('status');

        $file       = $request->file('foto');
        if($file != ''){
            $filex      = $file->getClientOriginalName();
            $ext        = $file->getClientOriginalExtension();
            $fileName   = rand(100000,1001238912).".".$ext;

            $request->file('foto')->move("foto/galeri/", $fileName);
            $galeri->file= $fileName;
        }

        $galeri->save();

        return redirect('galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $g = Galeri::whereId($id)->firstOrFail();
        return view('admin.galeri.edit',['g' => $g]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GaleriFormRequest  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(GaleriFormRequest $request, $id)
    {
        $galeri = Galeri::whereId($id)->firstOrFail();

        $galeri->judul      =$request->get('judul');
        $galeri->ket        =$request->get('ket');
        $galeri->id_user    =$request->get('penulis');
        $galeri->status     =$request->get('status');

        if (empty($request->file('foto'))){
            $galeri->file = $galeri->file;
        }
        else{
            unlink("foto/galeri/".$galeri->file); //menghapus file lama
            $file       = $request->file('foto');
            $filex      = $file->getClientOriginalName();
            $ext        = $file->getClientOriginalExtension();
            $fileName   = rand(100000,1001238912).".".$ext;

            $request->file('foto')->move("foto/galeri/", $fileName);
            $galeri->file= $fileName;
        }

        $galeri->save();
        return redirect(action('GaleriController@edit', $galeri->id))->with('status', 'Galeri dengan id '.$galeri->id.' telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::whereId($id)->firstOrFail();
        $galeri->delete();
        return redirect('galeri');
    }
}
