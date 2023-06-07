<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gabsi;
use DB;
use App\Models\Kejuaraan;
use App\Models\Kategori;
use App\Models\Pemain;
use App\Models\Jabatan;
use App\Models\Club;

class TitipController extends Controller
{
    public function sejarah()
    {
        return view('organisasi.sejarah');
    }

    public function pengurus()
    {
        return view('organisasi.pengurus');
    }

    public function pusat()
    {
         $pusate = Gabsi::all();
         $pusats = DB::select(DB::raw("select p.*, p.id as id_periode, g.id as id_gabsi, p.masa_bakti_awal as masabaktiawal, p.masa_bakti_akhir as masabaktiakhir from periodes as p inner join gabsis as g on g.id=p.id_gabsi where g.keterangan='Pusat'"));
            return view('organisasi.pusat', ['pusats' => $pusats, 'pusate' => $pusate]);
    }

    public function jatim()
    {
         $jatime = Gabsi::all();
         $jatims = DB::select(DB::raw("select p.*, p.id as id_periode, g.id as id_gabsi, p.masa_bakti_awal as masabaktiawal, p.masa_bakti_akhir as masabaktiakhir from periodes as p inner join gabsis as g on g.id=p.id_gabsi where g.keterangan='Jatim'"));
            return view('organisasi.jatim', ['jatims' => $jatims, 'jatime' => $jatime]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detailjatim(Request $request)
    {
        $id_periode  = $request->get('periode');
        $id_gabsi  = $request->get('id_gabsi');

        $gabsis = Gabsi::join('periodes', 'gabsis.id', '=', 'periodes.id_gabsi')->where('gabsis.id', '=', $id_gabsi)->where('periodes.id', '=', $id_periode)->select('gabsis.*', 'periodes.*')->get();

        $clubs = Gabsi::join('clubs', 'gabsis.id', '=', 'clubs.id_gabsi')->where('gabsis.id', '=', $id_gabsi)->get();

        $strukturs = DB::select(DB::raw("
            select g.id as id_gabsi, g.nama as namagabsi, g.alamat as alamatgabsi, g.no_tlp as notlp, g.email as email, g.keterangan as ket, g.foto as fotogabsi,
            p.id as id_periode, p.SK, p.masa_bakti_awal, p.masa_bakti_akhir, p.muskabkot, p.tgl_surat, p.no_surat, p.rekomkoni,
            j.id as id_jabatan, j.id_struktur as id_strukture, j.jabatan, j.divisi
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            WHERE g.id = $id_gabsi and p.id = $id_periode"));

        $pengurus = DB::select(DB::raw("
            select g.id as id_gabsi, g.nama as namagabsi, g.alamat as alamatgabsi, g.no_tlp as notlp, g.email as email, g.keterangan as ket, g.foto as fotogabsi,
            p.id as id_periode, p.SK, p.masa_bakti_awal, p.masa_bakti_akhir, p.muskabkot, p.tgl_surat, p.no_surat, p.rekomkoni,
            j.id as id_jabatan, j.id_struktur as id_strukture, j.jabatan, j.divisi,
            s.id as id_struktur, s.nama as namaorg, s.alamat as alamatorg, s.foto as fotoorg
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            inner join strukturs as s on s.id = j.id_struktur
            WHERE g.id = $id_gabsi and p.id = $id_periode"));

        $hitungPerDivisi = DB::select(DB::raw("
            select j.divisi as namaDivisi ,count(j.divisi) as hitung
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            WHERE g.id = $id_gabsi and p.id = $id_periode
            group by j.divisi"));

            return view('organisasi.detailjatim', ['gabsis' => $gabsis, 'strukturs' => $strukturs, 'pengurus' => $pengurus, 'clubs' => $clubs, 'count' => $hitungPerDivisi]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detailpusat(Request $request)
    {
        $id_periode  = $request->get('periode');
        $id_gabsi  = $request->get('id_gabsi');

        $gabsis = Gabsi::join('periodes', 'gabsis.id', '=', 'periodes.id_gabsi')->where('gabsis.id', '=', $id_gabsi)->where('periodes.id', '=', $id_periode)->select('gabsis.*', 'periodes.*')->get();

        $strukturs = DB::select(DB::raw("
            select g.id as id_gabsi, g.nama as namagabsi, g.alamat as alamatgabsi, g.no_tlp as notlp, g.email as email, g.keterangan as ket, g.foto as fotogabsi,
            p.id as id_periode, p.SK, p.masa_bakti_awal, p.masa_bakti_akhir, p.muskabkot, p.tgl_surat, p.no_surat, p.rekomkoni,
            j.id as id_jabatan, j.id_struktur as id_strukture, j.jabatan, j.divisi
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            WHERE g.id = $id_gabsi and p.id = $id_periode"));

        $pengurus = DB::select(DB::raw("
            select g.id as id_gabsi, g.nama as namagabsi, g.alamat as alamatgabsi, g.no_tlp as notlp, g.email as email, g.keterangan as ket, g.foto as fotogabsi,
            p.id as id_periode, p.SK, p.masa_bakti_awal, p.masa_bakti_akhir, p.muskabkot, p.tgl_surat, p.no_surat, p.rekomkoni,
            j.id as id_jabatan, j.id_struktur as id_strukture, j.jabatan, j.divisi,
            s.id as id_struktur, s.nama as namaorg, s.alamat as alamatorg, s.foto as fotoorg
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            inner join strukturs as s on s.id = j.id_struktur
            WHERE g.id = $id_gabsi and p.id = $id_periode"));

        $hitungPerDivisi = DB::select(DB::raw("
            select j.divisi as namaDivisi ,count(j.divisi) as hitung
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            WHERE g.id = $id_gabsi and p.id = $id_periode
            group by j.divisi"));

            return view('organisasi.detailpusat', ['gabsis' => $gabsis, 'strukturs' => $strukturs, 'pengurus' => $pengurus, 'count' => $hitungPerDivisi, 'count' => $hitungPerDivisi]);

    }

    public function kabkot()
    {
         $kabkots = Gabsi::all();
            return view('organisasi.kabkot', ['kabkots' => $kabkots]);
    }

    public function kabkotperiode($id)
    {
         $gabsis = Gabsi::where('gabsis.id', '=', $id)->get();
         $periodes = DB::select(DB::raw("select p.*, p.id as id_periode, g.id as id_gabsi, p.masa_bakti_awal as masabaktiawal, p.masa_bakti_akhir as masabaktiakhir from periodes as p inner join gabsis as g on g.id=p.id_gabsi where g.id=$id"));

            return view('organisasi.kabkotperiode', ['gabsis' => $gabsis, 'periodes' => $periodes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detailkabkot(Request $request)
    {

        $id_periode  = $request->get('periode');
        $id_gabsi  = $request->get('id_gabsi');

        $gabsis = Gabsi::join('periodes', 'gabsis.id', '=', 'periodes.id_gabsi')->where('gabsis.id', '=', $id_gabsi)->where('periodes.id', '=', $id_periode)->select('gabsis.*', 'periodes.*')->get();

        $clubs = Gabsi::join('clubs', 'gabsis.id', '=', 'clubs.id_gabsi')->where('gabsis.id', '=', $id_gabsi)->get();

        $strukturs = DB::select(DB::raw("
            select g.id as id_gabsi, g.nama as namagabsi, g.alamat as alamatgabsi, g.no_tlp as notlp, g.email as email, g.keterangan as ket, g.foto as fotogabsi,
            p.id as id_periode, p.SK, p.masa_bakti_awal, p.masa_bakti_akhir, p.muskabkot, p.tgl_surat, p.no_surat, p.rekomkoni,
            j.id as id_jabatan, j.id_struktur as id_strukture, j.jabatan, j.divisi
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            WHERE g.id = $id_gabsi and p.id = $id_periode"));

        $pengurus = DB::select(DB::raw("
            select g.id as id_gabsi, g.nama as namagabsi, g.alamat as alamatgabsi, g.no_tlp as notlp, g.email as email, g.keterangan as ket, g.foto as fotogabsi,
            p.id as id_periode, p.SK, p.masa_bakti_awal, p.masa_bakti_akhir, p.muskabkot, p.tgl_surat, p.no_surat, p.rekomkoni,
            j.id as id_jabatan, j.id_struktur as id_strukture, j.jabatan, j.divisi,
            s.id as id_struktur, s.nama as namaorg, s.alamat as alamatorg, s.foto as fotoorg
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            inner join strukturs as s on s.id = j.id_struktur
            WHERE g.id = $id_gabsi and p.id = $id_periode"));
        $hitungPerDivisi = DB::select(DB::raw("
            select j.divisi as namaDivisi ,count(j.divisi) as hitung
            from gabsis as g
            inner join periodes as p on g.id = p.id_gabsi
            inner join jabatans as j on p.id = j.id_periode
            WHERE g.id = $id_gabsi and p.id = $id_periode
            group by j.divisi"));

            return view('organisasi.detailkabkot', ['gabsis' => $gabsis, 'strukturs' => $strukturs, 'pengurus' => $pengurus, 'clubs' => $clubs, 'count' => $hitungPerDivisi]);
    }

    public function anggotaclub($id)
    {
        $pemains = Pemain::where('pemains.id_clubs', '=', $id)->get();
        $clubs   = Club::where('clubs.id', '=', $id)->get();

        return view('organisasi.anggotaclub', ['pemains' => $pemains, 'clubs' => $clubs]);
    }

    public function kejuaraan()
    {
        $kejuaraans = Kejuaraan::all();
        return view('jadwal.kejuaraan', ['kejuaraans' => $kejuaraans]);
    }
    public function show($id)
    {
        $kejuaraans = Kejuaraan::whereId($id)->firstOrFail();
        return view('jadwal.show', ['kejuaraans' => $kejuaraans]);
    }

    public function hasilkejuaraan()
    {

        $kategoris = Kategori::all();
        return view('jadwal.hasilkejuaraan', ['kategoris' => $kategoris]);
    }

    public function atlet()
    {
        $pemains = Pemain::all();
        return view('pemain.atlet', ['pemains' => $pemains]);
    }

}

