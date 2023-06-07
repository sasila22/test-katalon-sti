<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Gabsi;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all();
        return view('club.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gabsis=Gabsi::all();
        return view ('club.create', ['gabsis'=>$gabsis]);
    }

    public function ambilAsal()
    {
        $gabsis=Gabsi::all();
        return view ('club.create', ['gabsis'=>$gabsis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $club = new Club();
        $club->id_gabsi=$request->get('asal');
        $club->nama=$request->get('namaclub');
        $club->alamat=$request->get('alamat');
        $club->no_tlp=$request->get('no_tlp');
        $club->email=$request->get('email');
        $foto=$request->file('foto');
         if($foto != ''){
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/club",$fileName);
                $club->foto= 'images/club/'.$fileName;
            }


        $club->save();

        return redirect('club');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clubs=Club::whereId($id)->firstOrFail();
        $gabsis=Gabsi::all();
        return view ('club.edit', compact('clubs', 'gabsis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $club = Club::whereId($id)->firstOrFail();
        $club->id_gabsi=$request->get('asal');
        $club->nama=$request->get('namaclub');
        $club->alamat=$request->get('alamat');
        $club->no_tlp=$request->get('no_tlp');
        $club->email=$request->get('email');
         $foto=$request->file('foto');
         if($foto != ''){
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/club",$fileName);
                $club->foto= 'images/club/'.$fileName;
            }        
        $club->save();

        return redirect('club');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $club = Club::whereId($id)->firstOrFail();
        $club->delete();
        return redirect('club');
    }
}
