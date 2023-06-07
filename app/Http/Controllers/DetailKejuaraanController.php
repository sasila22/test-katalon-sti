<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\Request;
use App\Models\DetailKejuaraan;
use App\Models\Kejuaraan;
use App\Models\Pemain;
use App\Models\User;
use App\Models\Peserta;
use App\Models\Pendaftaran;
use App\Models\Prestasi;
use App\Models\Gabsi;
use DB;
use Auth;

use App\Http\Requests\DetailKejuaraanFormRequest;

class DetailKejuaraanController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(DetailKejuaraan $detail)
    {
        
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
    public function bayar($id){
        return view('pendaftaran.bayar',['id' => $id]);
    }
    public function submitbukti(DetailKejuaraanFormRequest $request){
        $pendaftar = Pendaftaran::find($request->get('id'));
        $doc       = $request->file('bukti');
        $docx      = $doc->getClientOriginalName();
        $dext      = $doc->getClientOriginalExtension();
        $docName   = $pendaftar->id.".".$dext;
        $request->file('bukti')->move("buktiPembayaran/", $docName);

        $pendaftar->buktiPembayaran = $docName;
        $pendaftar->save();

        $det = DetailKejuaraan::find($pendaftar->id_detailkejuaraan);

        return redirect('kejuaraan/pendaftar/listDiikuti')->with('status','berhasil update pembayaran');
    }
    public function pemenang($id){
        $pemain = Pemain::all();
        $kejuaraan = Kejuaraan::all();
        $prestasis = Prestasi::join("pemains", "prestasis.id_pemain","pemains.id")->join("kejuaraans","prestasis.id_kejuaraan","kejuaraans.id")->select("pemains.nama_depan","pemains.nama_belakang","kejuaraans.nama","prestasis.*")->where('pemains.id_gabsis',Auth::user()->id_gabsi)->where('kejuaraans.id',$id)->get();
        
        return view('pendaftaran.pemenang', compact('prestasis','pemain','kejuaraan'));
    }
    public function listKejuaraan(){
        date_default_timezone_set("Asia/Jakarta");
        $jamsekarang = date("H");
        $kejuaraan = DB::select(DB::raw("SELECT * FROM kejuaraans WHERE tgl_publikasi <= CURDATE() AND tgl_akhir_pendaftaran >= CURDATE()"));
        foreach ($kejuaraan as $value) {
            $value->keterangan = strip_tags($value->keterangan);
        }

        return view('pendaftaran.index', ['kejuaraans' => $kejuaraan]);
    }
    public function listDiikuti(){
        date_default_timezone_set("Asia/Jakarta");
        $pendaftars = [];
        $pendaftar = Pendaftaran::where('id_gabsi',Auth::user()->id_gabsi)->get();
        $kejuaraans = [];

        foreach ($pendaftar as $value) {
            $det = DetailKejuaraan::find($value->id_detailkejuaraan);
            $val = Kejuaraan::find($det->id_kejuaraan);
            array_push($kejuaraans, $val);
            $value->detailKU = $det->ku;
            $value->namaKejuaraan = $val->nama;
            $value->idkejuaraan = $val->id;
            $value->tanggalMulai = $val->tgl_awal;
            if($val->tgl_akhir <= date("Y-m-d")){
                $value->cektgl = 1;
            }
            else{
                $value->cektgl = 0;
            }
            $value->detailJenis = $det->jenis;
            array_push($pendaftars, $value);
        }           
        
        return view('pendaftaran.listDaftar',['pendaftars' => $pendaftars,'kejuaraans'=>$kejuaraans]);
    }
    public function formulirPendaftaran($id,$user){
        $kejuaraan = Kejuaraan::find($id);
        $detailKejuaraan = DetailKejuaraan::where("id_kejuaraan",$id)->get();
        if($kejuaraan->bentukKejuaraan == '0'){
            $userLogin = User::find($user);
            $pemain = Pemain::select(DB::raw("CONCAT(nama_depan,' ',nama_belakang,' ','(',id,') - ',Cast((datediff(CURRENT_DATE, pemains.tanggal_lahir)/365) as int)) AS value"))->where("id_gabsis",$userLogin->id_gabsi)->get();
        }else{
            $pemain = Pemain::select(DB::raw("CONCAT(nama_depan,' ',nama_belakang,' ','(',id,') - ',Cast((datediff(CURRENT_DATE, pemains.tanggal_lahir)/365) as int)) AS value"))->get();
        }
        return view('pendaftaran.formulirpendaftaran', ['kejuaraan' => $kejuaraan, 'detailKejuaraans' => $detailKejuaraan, 'pemains' => $pemain]);
    }
    // public function UpdatePesertaAuto(Request $request){
    //     $iddetail = $request->get('iddetail');
    //     $umur = $request->get('umur');
    //     $user = $request->get('user');
    //     $detail = DetailKejuaraan::find($iddetail);
    //     $kejuaraan = Kejuaraan::find($detail->id_kejuaraan);
    //     $datemin = date("Y",strtotime(date("Y/m/d"))-($umur*3600*24*365));
    //     if($kejuaraan->bentukKejuaraan == '0'){
    //         $userLogin = User::where("name",$user)->get();
    //         $pemain = Pemain::select(DB::raw("CONCAT(nama_depan,' ',nama_belakang,' ','(',id,')') AS value"))->where("id_gabsis",$userLogin->id_gabsi)->whereYear('tanggal_lahir','=',$datemin)->get();
    //     }else{
    //         $pemain = Pemain::select(DB::raw("CONCAT(nama_depan,' ',nama_belakang,' ','(',id,')') AS value"))->whereYear('tanggal_lahir','=',$datemin)->get();
    //     }

    //     return response()->json(array('msg'=>$pemain
    //         ), 200);
    // }
    public function storePendaftaran(DetailKejuaraanFormRequest $request){
        $rawKU = $request->get('selectKU');
        $arr = explode(":", $rawKU);
        $idDetail = $arr[2]; 
        $namaTeam = $request->get('namateam');

        $detail = DetailKejuaraan::find($idDetail);
        $official = "";

        $jmlhpeserta = 0;
        if($detail->jenis == 'Perkelompok'){
            $jmlhpeserta = 2;
        }else{
            $jmlhpeserta = 6;
            if(!empty($request->get('official'))){
                $official = $request->get('official');
            }
            else{
                return redirect()->back()->with('status','Gagal Melakukan Pendaftaran Karena NPC tidak boleh kosong');
            }

            if($request->get('sebagai') == 'pc'){
                $id = explode("(", $official);
                $official = $id[0];
                $usiaof = $id[1];
                $usiaof = explode(') - ', $usiaof);
                $usia = explode('-', $detail->ku);
                if($usiaof[1] != $usia[1]){
                    return redirect()->back()->with('status','Gagal Melakukan Pendaftaran Karena PC tidak boleh berbeda usia'. $usiaof);
                }
            }
        }

        for($i = 1;$i <= $jmlhpeserta;$i++){
            if(!empty($request->get('atlet'.$i))){
                $peserta = $request->get('atlet'.$i);
                $idpeserta = explode("(", $peserta);
                $idpeserta = $idpeserta[1];
                $idpeserta = explode(') - ', $idpeserta);
                $usia = explode('-', $detail->ku);
                $id = $detail->id;
                if($idpeserta[1] != $usia[1]){
                    //return url('pendaftaran.kejuaraan.formulirPendaftaran');
                    return redirect()->back()->with('status','Gagal Melakukan Pendaftaran Karena perbedaan usia');
                    //return view('pendaftaran/kejuaraan/formulirPendaftaran/'.$id.'/'.$user);
                    //return redirect()->route('pendaftaran.kejuaraan.formulirPendaftaran',['id'=>$detail->id, 'user'=>Auth::user()->id]);
                    //return redirect(action('DetailKejuaraan@formulirPendaftaran'),['id'=>$detail->id, 'user'=>Auth::user()->id])->with('statussalah', 'Usia user tidak sesuai');
                }
            }
        }

        $newpendaftaran = new Pendaftaran();
        $newpendaftaran->id_detailkejuaraan = $idDetail;
        $newpendaftaran->namaTeam = $namaTeam;
        $newpendaftaran->statusPembayaran = 0;
        $newpendaftaran->id_gabsi = Auth::user()->id_gabsi;
        if($official != ""){
            if($request->get('sebagai') == 'npc'){
                $newpendaftaran->npc = $official;
            }
            else{
                $newpendaftaran->pc = $official;
            }
        }
        $newpendaftaran->save();

        $kejuaraan = Kejuaraan::find($detail->id_kejuaraan);

        $pen = DB::table('pendaftarans')->orderBy('id','desc')->first();

        if($kejuaraan->CC == 1){
            $doc       = $request->file('fileCC');
            $docx      = $doc->getClientOriginalName();
            $dext      = $doc->getClientOriginalExtension();
            $docName   = $pen->id.".".$dext;
            $request->file('fileCC')->move("CC/", $docName);
            $newpendaftaran->CC = $docName;
            $newpendaftaran->save();
        }
        
        for($i = 1;$i <= $jmlhpeserta;$i++){
            if(!empty($request->get('atlet'.$i))){
                $peserta = $request->get('atlet'.$i);
                $idpeserta = explode("(", $peserta);
                $idpeserta = $idpeserta[1];
                $idpeserta = explode(') - ', $idpeserta);
                $usia = explode('-', $detail->ku);
                $ps = new Peserta();
                $ps->id_pemain = $idpeserta[0];
                $ps->statusAbsen = 0;
                $ps->id_pendaftaran = $pen->id;
                
                $ps->save();
            }
        }
        return redirect('pendaftaran/kejuaraan')->with('status','Berhasil Melakukan Pendaftaran');
    }
    public function listTeam($id)
    {
        $pendaftar = Pendaftaran::find($id);

        $pesertas = Peserta::where("id_pendaftaran",$id)->get();
        foreach ($pesertas as $p) {
            $pemain = Pemain::find($p->id_pemain);
            $gab = Gabsi::find($pemain->id_gabsis);
            $p->nama = $pemain->nama_depan ." ". $pemain->nama_belakang;
            $p->tanggalLahir = $pemain->tanggal_lahir;
            $p->gabsi = $gab->nama;
        }
        return view('pendaftaran.listTeam',['pesertas' => $pesertas,'pendaftar' => $pendaftar]);
    }

}
