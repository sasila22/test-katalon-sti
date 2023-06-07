<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\Gabsi;
use App\Models\Struktur;
use App\Models\Periode;
use Carbon\Carbon;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatans=Jabatan::all();
        return view ('jabatan.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodes=Periode::all();
        // $periodes->masa_bakti_awal=Carbon::now()->format('Y');
        // $periodes->masa_bakti_akhir=Carbon::now()->format('Y');


        $strukturs=Struktur::all();
        return view('jabatan.create', compact ('periodes', 'strukturs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodes = $request->get('id_periode');
        $strukturs = $request->get('id_struktur');
        $jabatans = $request->get('jabatan');
        $divisis = $request->get('divisi');
        for($i =0;$i < count($periodes);$i++){
            $jabatan = new Jabatan();
            $j = strtoupper($jabatans[$i]);
            $d = strtoupper($divisis[$i]);
            $jabatan->id_periode=$periodes[$i];
            $jabatan->id_struktur=$strukturs[$i];
            $jabatan->jabatan= $j;
            $jabatan->divisi= $d;

            $jabatan->save();
        }
        return redirect('jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatans=Jabatan::whereId($id)->firstOrFail();
        $periodes=Periode::all();
        $strukturs=Struktur::all();
        return view('jabatan.edit', compact ('periodes', 'strukturs','jabatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::whereId($id)->firstOrFail();
        $jabatan->id_periode=$request->get('id_periode');
        $jabatan->id_struktur=$request->get('id_struktur');
        $jabatan->jabatan=$request->get('jabatan');
        $jabatan->divisi=$request->get('divisi');

        $jabatan->save();

        return redirect('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $jabatan = Jabatan::whereId($id)->firstOrFail();
         $jabatan->delete();
         return redirect('jabatan');
    }
}
