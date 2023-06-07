<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Pemain;
use App\Models\Kejuaraan;
use Auth;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemain = Pemain::all();
        $kejuaraan = Kejuaraan::all();
        if(Auth::user()->id_gabsi == 0){
            $prestasis = Prestasi::join("pemains", "prestasis.id_pemain","pemains.id")->join("kejuaraans","prestasis.id_kejuaraan","kejuaraans.id")->select("pemains.nama_depan","pemains.nama_belakang","kejuaraans.nama","prestasis.*")->get();
        }
        else{
            $prestasis = Prestasi::join("pemains", "prestasis.id_pemain","pemains.id")->join("kejuaraans","prestasis.id_kejuaraan","kejuaraans.id")->select("pemains.nama_depan","pemains.nama_belakang","kejuaraans.nama","prestasis.*")->where('pemains.id_gabsis',Auth::user()->id_gabsi)->get();
        }
        
        return view('prestasi.index', compact('prestasis','pemain','kejuaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemain = Pemain::orderBy('nama_depan','asc')->get();

        $kejuaraan = Kejuaraan::orderBy('nama','asc')->get();
        return view('prestasi.create', compact('pemain','kejuaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataket = $request->get('ket');
        $datalomba = $request->get('id_kejuaraan');
        $datapres = $request->get('pres');
        $datanom =$request->get('nom');
        $datapoint = $request->get('point');
        for ($i=0; $i < count($dataket); $i++) {
            $prestasi = new Prestasi;
            $prestasi->id_prestasi = $request->id_prestasi;
            $prestasi->id_kejuaraan = $datalomba[$i];
            $prestasi->id_pemain = $request->id_pemain;
            $prestasi->keterangan = $dataket[$i];
            $prestasi->prestasi_peringkat = $datapres[$i];
            $prestasi->nomor_spesialis = $datanom[$i];
            $prestasi->point = $datapoint[$i];
    
            $prestasi->save();
        }
        

        
        return redirect(action('PrestasiController@index'))->with('status','Data prestasi telah berhasil ditambah');
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
        $prestasi = Prestasi::find($id);
        $pemain = Pemain::all();
        $kejuaraan = Kejuaraan::all();
        
        return view('prestasi.edit',compact('prestasi','pemain','kejuaraan'));
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
        $prestasi = Prestasi::find($id);
       
        $prestasi->id_kejuaraan = $request->id_kejuaraan;
        $prestasi->id_pemain = $request->id_pemain;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->prestasi_peringkat = $request->pres;
        $prestasi->nomor_spesialis = $request->nom;
        

        $prestasi->save();
        

        return redirect(action('PrestasiController@index'))->with('status','Data Prestasi telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi= Prestasi::find($id);        
        $prestasi->delete();
        return redirect(action('PrestasiController@index'))->with('status','Data Prestasi telah berhasil dihapus');
    }
}
