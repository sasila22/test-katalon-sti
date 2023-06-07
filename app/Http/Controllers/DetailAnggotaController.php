<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Divisi;
use App\Models\Periode;
use App\Models\Anggota;
use App\Models\DetailAnggota;
use DB;

class DetailAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function showDetail($id)
    {
        // $id = $request->get('id');
        $detail = DetailAnggota::where('id',$id)->get();
        $daerah = DB::table('kabupatens')
                  ->select('kabupatens.kabupaten_kota')
                  ->where('kabupatens.id','=',$id)
                  ->get();
        $periode = DB::table('periodes')
                  ->join('detail_anggotas','periodes.id','=','detail_anggotas.id_periode')
                  ->join('kabupatens','kabupatens.id','=','detail_anggotas.id_kabupaten')
                  ->select('periodes.SK', 'periodes.masa_bakti_awal', 'periodes.masa_bakti_akhir')
                  ->where('detail_anggotas.id_kabupaten','=',$id)
                  ->limit(1)
                  ->get();
        $anggota = DB::table('anggota')
                    ->join('detail_anggotas','anggota.id','=','detail_anggotas.id_anggota')
                    ->join('divisis','divisis.id','=','detail_anggotas.id_divisi')
                    ->join('kabupatens','detail_anggotas.id_kabupaten','=','kabupatens.id')
                    ->select('anggota.nama', 'divisis.nama_divisi')
                    ->where('detail_anggotas.id_kabupaten','=',$id)
                    ->get();
        //dd($periode);
        return view('organisasi.detailanggota', compact('detail','anggota','daerah','periode'));
        
    }
}
