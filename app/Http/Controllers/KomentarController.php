<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use App\Models\Berita;

use Auth;
use Route;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\KomentarFormRequest;

class KomentarController extends Controller
{

    /*INI CODE MIDDLEWARE, ARTINYA CONTROLLER INI KHUSUS ADMIN*/
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
        $komentars = Komentar::all();
        return view('admin.komentar.index', ['komentars' => $komentars]);
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
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\KomentarFormRequest  $request
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $komentar = Komentar::whereId($id)->firstOrFail();

        if ($komentar->status == 0) {
            $s = 1;
            $komentar->status= $s;
            $komentar->save();

            return redirect('komentar')->with('stats', 'komentar dengan id '.$komentar->id.' telah berhasil ditampilkan');
        }
        elseif ($komentar->status == 1) {
            $s = 0;
            $komentar->status= $s;
            $komentar->save();

            return redirect('komentar')->with('stats', 'komentar dengan id '.$komentar->id.' telah berhasil disembunyikan');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komentar = Komentar::whereId($id)->firstOrFail();
        $komentar->delete();
        return redirect('komentar')->with('stats', 'komentar dengan id '.$komentar->id.' telah berhasil dihapus');
    }
}
