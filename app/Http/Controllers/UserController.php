<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gabsi;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users=User::where('users.status', '=', '2')->get();
        return view('sekretaris.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gabsis=Gabsi::all();
        return view('sekretaris.create', compact('gabsis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name=$request->get('username');
        $user->email=$request->get('email');
        $user->status=2;
        $user->password=bcrypt($request->get('password'));
        $user->id_gabsi=$request->get('id_gabsi');
        
        $user->save();

        return redirect('user')->with('status', 'Admin dari Pengurus Bridge '.$user->gabsis->nama.' telah berhasil ditambahkan');
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
        $users=User::whereId($id)->firstOrFail();
        $gabsis=Gabsi::all();
        return view ('sekretaris.edit', ['users'=>$users, 'gabsis'=>$gabsis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::whereId($id)->firstOrFail();

        $user->username=$request->get('username');
        $user->email=$request->get('email');
        $user->status=2;
        $user->password=$user->password;
        $user->id_gabsi=$request->get('id_gabsi');
        
        $user->save();
        return redirect('user')->with('status', 'Admin dengan id '.$user->id.' telah berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::whereId($id)->firstOrFail();
        $users->delete();
        return redirect('user');
    }
}
