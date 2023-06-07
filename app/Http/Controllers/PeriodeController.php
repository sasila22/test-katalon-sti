<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Periode;
use App\Models\Gabsi;
use DB;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodes=DB::select(DB::raw("select p.*, g.id as id_gabsis, g.nama as namaorg, g.alamat as almtorg, g.no_tlp as tlporg, g.email as emailorg, g.keterangan as ketorg from periodes as p inner join gabsis as g on p.id_gabsi = g.id"));
        return view('periode.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodes=DB::select(DB::raw("select g.id as id_gabsis, g.nama as namaorg, g.alamat as almtorg, g.no_tlp as tlporg, g.email as emailorg, g.keterangan as ketorg from gabsis as g"));
        return view('periode.create', ['periodes'=>$periodes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $period = new Periode();

        $period->SK=$request->get('nosk');
        $period->masa_bakti_awal=$request->get('tgla');
        $period->masa_bakti_akhir=$request->get('tglb');
        $period->muskabkot=$request->get('muskabkot');
        $period->tgl_surat=$request->get('tglsurat');
        $period->no_surat=$request->get('nosurat');
        $period->rekomkoni=$request->get('rekomkoni');
        $period->id_gabsi=$request->get('organisasi');
        $period->save();

        return redirect('periode');
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
        $periodes=DB::select(DB::raw("select p.*, g.id as id_gabsis, g.nama as namaorg, g.alamat as almtorg, g.no_tlp as tlporg, g.email as emailorg, g.keterangan as ketorg from periodes as p inner join gabsis as g on p.id_gabsi = g.id where p.id =$id "));
        $gabsis=Gabsi::all();
        return view('periode.edit', compact('periodes', 'gabsis'));
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
        $periodes=Periode::whereId($id)->firstOrFail();

        $periodes->SK=$request->get('nosk');
        $periodes->masa_bakti_awal=$request->get('tgla');
        $periodes->masa_bakti_akhir=$request->get('tglb');
        $periodes->muskabkot=$request->get('muskabkot');
        $periodes->tgl_surat=$request->get('tglsurat');
        $periodes->no_surat=$request->get('nosurat');
        $periodes->rekomkoni=$request->get('rekomkoni');
        $periodes->id_gabsi=$request->get('organisasi');
        $periodes->save();

        return redirect('periode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period = Periode::whereId($id)->firstOrFail();
         $period->delete();
         return redirect('periode');
    }
}
