<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strukturs = Struktur::all();
        return view('struktur.index', ['strukturs' => $strukturs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('struktur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $struktur = new Struktur();
        $struktur->nama=$request->get('namaa');
        $struktur->alamat=$request->get('alamatt');
        $foto=$request->file('foto');
         if($foto != ''){
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/struktur",$fileName);
                $struktur->foto= 'images/struktur/'.$fileName;
            }
                    
        $struktur->save();

        return redirect('struktur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $strukturs = Struktur::whereId($id)->firstOrFail();
         return view ('struktur.edit', ['strukturs'=>$strukturs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $struktur = Struktur::whereId($id)->firstOrFail();
        $struktur->nama=$request->get('namaa');
        $struktur->alamat=$request->get('alamatt');
        $foto=$request->file('foto');
         if($foto != '')
            {
                $fileName = $foto->getClientOriginalName();
                $request->file('foto')->move("images/struktur",$fileName);
                $struktur->foto= 'images/struktur/'.$fileName;
            }

        
        $struktur->save();

        return redirect('struktur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur = Struktur::whereId($id)->firstOrFail();
         $struktur->delete();
         return redirect('struktur');
    }
}
