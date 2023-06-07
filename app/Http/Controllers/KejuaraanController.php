<?php

namespace App\Http\Controllers;

use App\Models\Kejuaraan;
use App\Models\DetailKejuaraan;
use App\Models\Pendaftaran;
use App\Models\Peserta;
USE App\Models\Pemain;
use App\Models\Prestasi;
use App\Models\Gabsi;

use Auth;
use Route;

use Illuminate\Http\Request;
use App\Http\Requests\KejuaraanFormRequest;

class KejuaraanController extends Controller
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
        $kejuaraans = Kejuaraan::all();
        foreach ($kejuaraans as $value) {
            $value->keterangan = strip_tags($value->keterangan);
            $stat = 0;
            if (date("Y-m-d") < $value->tgl_akhir){
                $stat = 1;
            }
            if (date("Y-m-d") >= $value->tgl_awal && date("Y-m-d") <= $value->tgl_akhir) {
                $stat = 2;
            }
            $value->statTanggal = $stat;
        }
        return view('admin.kejuaraan.index', ['kejuaraans' => $kejuaraans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kejuaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  KejuaraanFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KejuaraanFormRequest $request)
    {
        $tgl    = $request->get('reservationtime');
        $tglpublikasi = $request->get('publicationtime');
        $temp = explode('-',$tgl);
        $temppublikasi = explode("-", $tglpublikasi);

        $dateFrom = $temp[0];
        $dateTo = $temp[1];
        $DateNew= strtotime( $dateFrom );
        $dateFrom = date( 'Y-m-d', $DateNew);
        $DateNew= strtotime( $dateTo );
        $dateTo = date( 'Y-m-d', $DateNew);

        $kejuaraan = new Kejuaraan();
        $kejuaraan->nama       = $request->get('nama');
        $kejuaraan->tgl_awal   = $dateFrom;
        $kejuaraan->tgl_akhir  = $dateTo;
        $kejuaraan->lokasi     = $request->get('lokasi');
        $kejuaraan->keterangan = strip_tags($request->get('editor1'));
        $kejuaraan->id_user    = $request->get('penulis');
        $kejuaraan->tgl_publikasi = date('Y-m-d', strtotime($temppublikasi[0]));
        $kejuaraan->jam_publikasi = $request->get("jamPublikasi");
        $kejuaraan->tgl_akhir_pendaftaran = date( 'Y-m-d', strtotime($temppublikasi[1]));
        $kejuaraan->bentukKejuaraan = $request->get("bentukLomba")[0];
        $kejuaraan->CC = $request->get('cc')[0];

        $doc       = $request->file('formulir');
        $docx      = $doc->getClientOriginalName();
        $dext      = $doc->getClientOriginalExtension();
        $docName   = rand(100000,1001238912).".".$dext;

        if ($dext == 'pdf') {
           $request->file('formulir')->move("formulir/", $docName);
           $kejuaraan->formulir= $docName;
        }
        else{
           return redirect(action('KejuaraanController@create'))->with('statussalah', 'Formulir Pendaftaran Kejuaraan Harus PDF.');
        }

        $file       = $request->file('foto');
        $filex      = $file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();
        $fileName   = rand(100000,1001238912).".".$ext;

        $request->file('foto')->move("foto/kejuaraan/", $fileName);
        $kejuaraan->foto = $fileName;

        $kejuaraan->save();

        $dataku = $request->get('ku');
        $datajenis = $request->get('jenis');

        for ($i=0; $i < count($dataku); $i++) {
            $detailKejuaraan = new DetailKejuaraan;
            $detailKejuaraan->id_kejuaraan = $kejuaraan->id;
            $detailKejuaraan->ku = "KU-".$dataku[$i];
            $detailKejuaraan->jenis = $datajenis[$i];
    
            $detailKejuaraan->save();
        }
        return redirect('kejuaraan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kejuaraan $kejuaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kejuaraans = Kejuaraan::whereId($id)->firstOrFail();
        return view('admin.kejuaraan.edit',['kejuaraans' => $kejuaraans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  KejuaraanFormRequest $request
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function update(KejuaraanFormRequest $request, $id)
    {
        
        $kejuaraan = Kejuaraan::whereId($id)->firstOrFail();

        $tgl    = $request->get('reservationtime');
        $temp = explode('-',$tgl);

        $dateFrom = $temp[0];
        $dateTo = $temp[1];
        $DateNew= strtotime( $dateFrom );
        $dateFrom = date( 'Y-m-d', $DateNew);
        $DateNew= strtotime( $dateTo );
        $dateTo = date( 'Y-m-d', $DateNew);


        $kejuaraan->nama       = $request->get('nama');
        $kejuaraan->tgl_awal   = $dateFrom;
        $kejuaraan->tgl_akhir  = $dateTo;
        $kejuaraan->lokasi     = $request->get('lokasi');
        $kejuaraan->keterangan = $request->get('editor1');
        $kejuaraan->id_user    = $request->get('penulis');


        if (empty($request->file('formulir'))){
            $kejuaraan->formulir = $kejuaraan->formulir;
        }
        else{
            unlink("formulir/".$kejuaraan->formulir); //menghapus file lama
            $doc       = $request->file('formulir');
            $docx      = $doc->getClientOriginalName();
            $dext      = $doc->getClientOriginalExtension();
            $docName   = rand(100000,1001238912).".".$dext;

            if ($dext == 'pdf') {
               $request->file('formulir')->move("formulir/", $docName);
               $kejuaraan->formulir= $docName;
            }
            else{
               return redirect(action('KejuaraanController@edit'))->with('statussalah', 'Formulir Pendaftaran Kejuaraan Harus PDF.');
            }

            $request->file('formulir')->move("formulir/", $docName);
            $kejuaraan->formulir= $docName;
        }

        if (empty($request->file('foto'))){
            $kejuaraan->foto = $kejuaraan->foto;
        }
        else{
            unlink("foto/kejuaraan/".$kejuaraan->foto); //menghapus file lama
            $file       = $request->file('foto');
            $filex      = $file->getClientOriginalName();
            $ext        = $file->getClientOriginalExtension();
            $fileName   = rand(100000,1001238912).".".$ext;

            $request->file('foto')->move("foto/kejuaraan/", $fileName);
            $kejuaraan->foto= $fileName;
        }

        $kejuaraan->save();
        return redirect('kejuaraan')->with('status', 'kejuaraan dengan id '.$kejuaraan->id.' telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kejuaraan  $kejuaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kejuaraan = Kejuaraan::find($id);
        $det = DetailKejuaraan::where('id_kejuaraan', $id)->get();
        $jmlh = 1;
        foreach ($det as $v) {
            $pendaftar = Pendaftaran::where('id_detailkejuaraan',$v->id)->get();
            if(!$pendaftar->isEmpty()){
                $jmlh = 0;
                break;
            }
        }

        if($jmlh <= 0){
            return redirect('kejuaraan')->with('status','Gagal menghapus perlombaan karena terdapat pendaftar');
        }
        else{
            foreach ($det as $value) {
                $value->delete();
            }
            $kejuaraan->delete();
        }
        return redirect('kejuaraan')->with('sukses','sukses menghapus data');
    }

    //Pendaftaran
    public function listPendaftar($id)
    {
        $kejuaraan = Kejuaraan::find($id);
        $detail = DetailKejuaraan::where('id_kejuaraan',$id)->get();
        $pendaftars = [];
        foreach ($detail as $det) {
            $pendaftar = Pendaftaran::where('id_detailkejuaraan',$det->id)->get();
            foreach ($pendaftar as $value) {
                $value->detailKU = $det->ku;
                $value->detailJenis = $det->jenis;
                $gabsi = Gabsi::find($value->id_gabsi);
                $value->gabsi = $gabsi->nama;
                array_push($pendaftars, $value);
            }
        }
        return view('admin.kejuaraan.pendaftar',['kejuaraan' => $kejuaraan,'pendaftars' => $pendaftars]);
    }
    
    public function konfirmasibayar(KejuaraanFormRequest $request){
        try{
            $pendaftar = Pendaftaran::find($request->get('id'));
            $pendaftar->statusPembayaran = 1;
            $pendaftar->save();
            $str = 0;
            if($pendaftar->buktiPembayaran == null){
                $str = 1;
            }
            return response()->json(array(
                'status'=>'oke',
                'buktiPembayaran'=>$str,
                'msg'=>'Berhasil Melakukan konfirmasi'
            ),200);  
        }
        catch(\PDOException $e){
            return response()->json(array(
                'status'=>'gagal',
                'msg'=>'Gagal melakukan konfirmasi'
            ),200);  
        }
        
    }
    public function deletePendaftar(Request $request){
        try{
            $pesertas = Peserta::where('id_pendaftaran',$request->get('id'))->get();
            foreach ($pesertas as $value) {
                $value->delete();
            }
            $pendaftar = Pendaftaran::find($request->get('id'));
            $str = "";
            if($pendaftar->statusPembayaran == 1){
                $str = "\nPastikan melakukan pengembalian uang ke ".$pendaftar->namaTeam;
            }
            $pendaftar->delete();

            return response()->json(array(
                'status'=>'oke',
                'msg'=>'Berhasil Menghapus data '.$str
            ),200);  
        }
        catch(\PDOException $e){
            return response()->json(array(
                'status'=>'gagal',
                'msg'=>'Gagal hapus data'
            ),200);  
        }
    }
    public function detailPendaftar($id)
    {
        $pendaftar = Pendaftaran::find($id);

        $pesertas = Peserta::where("id_pendaftaran",$id)->get();
        foreach ($pesertas as $p) {
            $pemain = Pemain::find($p->id_pemain);
            $gabsi = Gabsi::find($pemain->id_gabsis);
            $p->nama = $pemain->nama_depan ." ". $pemain->nama_belakang;
            $p->tanggalLahir = $pemain->tanggal_lahir;
            $p->gabsi = $gabsi->nama;
        }
        return view('admin.kejuaraan.showPeserta',['pesertas' => $pesertas,'pendaftar' => $pendaftar]);
    }
    public function absensi($id)
    {
        $kejuaraan = Kejuaraan::find($id);
        $detail = DetailKejuaraan::where('id_kejuaraan',$id)->get();
        $pendaftars = [];
        foreach ($detail as $det) {
            $pendaftar = Pendaftaran::where('id_detailkejuaraan',$det->id)->get();
            foreach ($pendaftar as $value) {
                $value->detailKU = $det->ku;
                $value->detailJenis = $det->jenis;
                $gabsi = Gabsi::find($value->id_gabsi);
                $value->gabsi = $gabsi->nama;
                array_push($pendaftars, $value);
            }
        }
        return view('admin.kejuaraan.absensi',['kejuaraan' => $kejuaraan,'pendaftars' => $pendaftars]);
    }
    public function absensiall($id)
    {
        $pe = Peserta::where('id_pendaftaran',$id)->get();
        foreach ($pe as $v) {
            $v->statusAbsen = 1;
            $v->save();
        }
        $pendaftar = Pendaftaran::find($id);
        $det = DetailKejuaraan::find($pendaftar->id_detailkejuaraan);
        $pesertas = Peserta::where("id_pendaftaran",$id)->get();
        foreach ($pesertas as $p) {
            $pemain = Pemain::find($p->id_pemain);
            $gab = Gabsi::find($pemain->id_gabsis);
            $p->nama = $pemain->nama_depan ." ". $pemain->nama_belakang;
            $p->tanggalLahir = $pemain->tanggal_lahir;
            $p->gabsi = $gab->nama;
        }
        return view('admin.kejuaraan.listTeam',['pesertas' => $pesertas,'pendaftar' => $pendaftar,'idkejuaraan' => $det->id_kejuaraan]);
    }
    public function listTeam($id)
    {
        $pendaftar = Pendaftaran::find($id);
        $det = DetailKejuaraan::find($pendaftar->id_detailkejuaraan);
        $pesertas = Peserta::where("id_pendaftaran",$id)->get();
        foreach ($pesertas as $p) {
            $pemain = Pemain::find($p->id_pemain);
            $gab = Gabsi::find($pemain->id_gabsis);
            $p->nama = $pemain->nama_depan ." ". $pemain->nama_belakang;
            $p->tanggalLahir = $pemain->tanggal_lahir;
            $p->gabsi = $gab->nama;
        }
        return view('admin.kejuaraan.listTeam',['pesertas' => $pesertas,'pendaftar' => $pendaftar,'idkejuaraan' => $det->id_kejuaraan]);
    }
    public function pemenang($id)
    {
        $kejuaraan = Kejuaraan::find($id);

        $prestasi = Prestasi::where("id_kejuaraan",$id)->get();
        foreach ($prestasi as $p) {
            $pemain = Pemain::find($p->id_pemain);
            $p->nama = $pemain->nama_depan ." ". $pemain->nama_belakang;
            $p->tanggalLahir = $pemain->tanggal_lahir;
        }
        return view('admin.kejuaraan.pemenang',['kejuaraan' => $kejuaraan,'prestasis' => $prestasi]);
    }
    public function updateAbsensi(Request $request){
        try{
            $pe = Peserta::find($request->get('id'));
            $pe->statusAbsen = 1;
            $pe->save();

            return response()->json(array(
                'status'=>'oke',
                'msg'=>'berhasil update absen'
            ),200);  
        }
        catch(\PDOException $e){
            return response()->json(array(
                'status'=>'gagal',
                'msg'=>'Gagal update absen'
            ),200);  
        }
    }
}
