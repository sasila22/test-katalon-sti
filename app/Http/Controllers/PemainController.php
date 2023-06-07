<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\Gabsi;
use App\Models\Club;
use Auth;
use Illuminate\Http\Request;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemains=Pemain::where('id_gabsis',Auth::user()->id_gabsi)->get();
        return view ('pemain.index', ['pemains'=>$pemains]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $gabsis=Club::all();
         return view ('pemain.create', ['gabsis'=>$gabsis]);
    }

    public function ambilNamaWilayah()
    {
        //
        $gabsis=Gabsi::all();
        return view ('pemain.create', ['gabsis'=>$gabsis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemain = new Pemain();
        $pemain->id_clubs=$request->get('club');
        $pemain->nama_depan=$request->get('namadpn');
        $pemain->nama_belakang=$request->get('namablkg');
        $pemain->jeniskelamin=$request->get('jenisklmn');
        $pemain->tempat_lahir=$request->get('tmptlahir');
        $pemain->tanggal_lahir=$request->get('tgllahir');
        $pemain->total_point = 0;
        $foto=$request->file('foto');
         if($foto != ''){
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/pemain",$fileName);
                $pemain->foto= 'images/pemain/'.$fileName;
            }

        $pemain->save();

        return redirect('pemaini');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function show(Pemain $pemain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pemains=Pemain::whereId($id)->firstOrFail();
        $gabsis=Club::all();
        return view ('pemain.edit', compact('pemains', 'gabsis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pemain = Pemain::whereId($id)->firstOrFail();
        $pemain->id_clubs=$request->get('club');
        $pemain->nama_depan=$request->get('namadpn');
        $pemain->nama_belakang=$request->get('namablkg');
        $pemain->jeniskelamin=$request->get('jenisklmn');
        $pemain->tempat_lahir=$request->get('tmptlahir');
        $pemain->tanggal_lahir=$request->get('tgllahir');
        $foto=$request->file('foto');
         if($foto != ''){
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/pemain",$fileName);
                $pemain->foto= 'images/pemain/'.$fileName;
            }        
        $pemain->save();

        return redirect('pemaini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $pemain = Pemain::whereId($id)->firstOrFail();
         $pemain->delete();
         return redirect('pemaini');
    }
}
