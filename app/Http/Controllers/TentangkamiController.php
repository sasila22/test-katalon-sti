<?php

namespace App\Http\Controllers;

use App\Models\Tentangkami;
use Illuminate\Http\Request;
use App\Http\Requests\TentangkamiFormRequest;

class TentangkamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentang = Tentangkami::all();
        return view('tentangkami.index', ['tentang' => $tentang]);
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
     * @param  \App\Tentangkami  $tentangkami
     * @return \Illuminate\Http\Response
     */
    public function show(Tentangkami $tentangkami)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tentangkami  $tentangkami
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tentang = Tentangkami::whereId($id)->firstOrFail();
        return view('admin.tentangkami.edit',['tentang' => $tentang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TentangkamiFormRequest  $request
     * @param  \App\Tentangkami  $tentangkami
     * @return \Illuminate\Http\Response
     */
    public function update(TentangkamiFormRequest $request, $id)
    {
        $tentang = Tentangkami::whereId($id)->firstOrFail();

        $tentang->tentanggabsi= $request->get('editor1');
        $tentang->notlp= $request->get('notlp');
        $tentang->email= $request->get('email');
        $tentang->alamat= $request->get('alamat');

        $tentang->save();
        return redirect(action('TentangkamiController@edit', $tentang->id))->with('status', 'Profil telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tentangkami  $tentangkami
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tentangkami $tentangkami)
    {
        //
    }
}
