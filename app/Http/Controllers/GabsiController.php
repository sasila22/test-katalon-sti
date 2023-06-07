<?php

namespace App\Http\Controllers;

use App\Models\Gabsi;
use Illuminate\Http\Request;

class GabsiController extends Controller
{

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
        //
        $gabsis=Gabsi::all();
        return view('gabsi.index', compact('gabsis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gabsi = new Gabsi();
        $gabsi->nama=$request->get('namaa');
        $gabsi->alamat=$request->get('alamatt');
        $gabsi->no_tlp=$request->get('telp');
        $gabsi->email=$request->get('emaill');
        $gabsi->keterangan=$request->get('keterangan');
         $foto=$request->file('foto');
         if($foto != ''){
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/gabsi",$fileName);
                $gabsi->foto= 'images/gabsi/'.$fileName;
            }
        $gabsi->save();

        return redirect('gabsi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gabsi  $gabsi
     * @return \Illuminate\Http\Response
     */
    public function show(Gabsi $gabsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gabsi  $gabsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gabsis=Gabsi::whereId($id)->firstOrFail();
        return view ('gabsi.edit', ['gabsis'=>$gabsis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gabsi  $gabsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gabsi = Gabsi::whereId($id)->firstOrFail();
        $gabsi->nama=$request->get('namaa');
        $gabsi->alamat=$request->get('alamatt');
        $gabsi->no_tlp=$request->get('telp');
        $gabsi->email=$request->get('emaill');
        $gabsi->keterangan=$request->get('keterangan');
         $foto=$request->file('foto');
         if($foto != '')
            {
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/gabsi",$fileName);
                $gabsi->foto= 'images/gabsi/'.$fileName;
            }
        $gabsi->save();

        return redirect('gabsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gabsi  $gabsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gabsi = Gabsi::whereId($id)->firstOrFail();
        $gabsi->delete();
        return redirect('gabsi');
    }

    
}
