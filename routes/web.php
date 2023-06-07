<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\KejuaraanController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\TentangkamiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\GabsiController;
use App\Http\Controllers\PemainController;
use App\Http\Controllers\StrukturController;

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailKejuaraanController;

use App\Http\Controllers\TitipController;
use App\Http\Controllers\KabupatenController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
/*Route::get('/beranda', 'HomeController@index');*/

// ROUTE INI DIPAKE KHUSUS ADMIN

Route::resource('berita', 'BeritaController');
Route::resource('komentar', 'KomentarController');
Route::resource('kejuaraan', 'KejuaraanController');
Route::resource('infor', 'InfoController');
Route::resource('tentanggabsi', 'TentangkamiController');
Route::resource('galeri', 'GaleriController');
Route::resource('prestasi', 'PrestasiController');
//Route::resource('pendaftaran','PendaftaranController');

// ROUTE INI DIPAKE KHUSUS USER UMUM ATAU YG GAPUNYA AKUN

Route::get('/unberita', 'PagesController@berita');
Route::get('/unberita/{idberita}', 'PagesController@beritadetail');
Route::get('/unkomentar', 'PagesController@showkomen');
Route::get('/unkejuaraan', 'PagesController@kejuaraan');
Route::get('/ungaleri', 'PagesController@galeri');
Route::get('/detailanggota/{id}', 'DetailAnggotaController@showDetail');

// ROUTE INI DIPAKE KHUSUS USER YG AKUN

Route::get('/eberita', 'AkunController@berita');
Route::get('/eberita/{idberita}', 'AkunController@beritadetail');
Route::post('/ekomentar', 'AkunController@simpankomen')->name('ekomentar.simpankomen');
Route::get('/ekejuaraan', 'AkunController@kejuaraan');
Route::get('/egaleri', 'AkunController@galeri');
Route::get('/einformasi', 'AkunController@informasi');
Route::post('/esimpaninfo', 'AkunController@simpaninfo')->name('esimpaninfo.simpaninfo');

Route::get('/ungaleri/{idevent}', 'PagesController@galeridetail');
Route::get('/egaleri/{idevent}', 'AkunController@galeridetail');

Route::resource('gabsi', 'GabsiController');
Route::resource('pemaini', 'PemainController');
Route::resource('struktur', 'StrukturController');
Route::resource('jabatan', 'JabatanController');
/*Route::resource('pengurus', 'PengurusController');*/
Route::resource('kejuaraani', 'KejuaraanController');
Route::resource('periode', 'PeriodeController');
Route::resource('club', 'ClubController');
Route::resource('user', 'UserController');
Route::resource('detailkejuaraan', 'DetailKejuaraanController');



Route::get('/sejarah', 'TitipController@sejarah');
Route::get('/pengurus', 'TitipController@pengurus');
Route::get('/pemain', 'TitipController@pemain');

Route::get('/pusat', 'TitipController@pusat');
Route::post('/detailpusat', 'TitipController@detailpusat');

Route::get('/jatim', 'KabupatenController@index');
Route::post('/detailjatim', 'TitipController@detailjatim');

Route::get('/anggotaclub/{id}', 'TitipController@anggotaclub');

Route::get('/kab', 'TitipController@kab');

Route::get('/kabkot', 'TitipController@kabkot');
Route::get('/kabkotperiode/{id}', 'TitipController@kabkotperiode');
Route::post('/detailkabkot', 'TitipController@detailkabkot');

Route::get('/titip/kejuaraan', 'TitipController@kejuaraan');
Route::get('/show/{id}', 'TitipController@show');
Route::get('/hasilkejuaraan', 'TitipController@hasilkejuaraan');
Route::get('/atlet', 'TitipController@atlet');

Route::post('/kejuaraan/createDetail','KejuaraanController@createDetailKejuaraan');

//pendaftaran
Route::get('/pendaftaran/kejuaraan','DetailKejuaraanController@listKejuaraan');
Route::get('/pendaftaran/kejuaraan/formulirPendaftaran/{id}/{user}','DetailKejuaraanController@formulirPendaftaran')->name('pendaftaran.kejuaraan.formulirPendaftaran');
//Route::post('/pendaftaran/kejuaraan/formulirPendaftaran','DetailKejuaraanController@UpdatePesertaAuto')->name('updatePesertaAutocomplete');
Route::post('/pendaftaran/kejuaraan/storePendaftaran','DetailKejuaraanController@storePendaftaran')->name('pendaftaran.kejuaraan.storePendaftaran');
//gabsi
Route::get('/kejuaraan/pendaftar/listDiikuti','DetailKejuaraanController@listDiikuti');
Route::get('/kejuaraan/pendaftar/listTeam/{id}','DetailKejuaraanController@listTeam');
Route::get('/kejuaraan/pendaftar/bayar/{id}','DetailKejuaraanController@bayar');
Route::post('/kejuaraan/pendaftar/submitbukti','DetailKejuaraanController@submitbukti');
Route::get('/kejuaraan/pendaftar/pemenang/{id}','DetailKejuaraanController@pemenang');

//admin
//pendaftaran
Route::get('/kejuaraan/pendaftar/{id}','KejuaraanController@listPendaftar');
Route::get('/kejuaraan/pendaftar/detail/{id}','KejuaraanController@detailPendaftar');
Route::post('/kejuaraan/pendaftar/konfirmasibayar','KejuaraanController@konfirmasibayar');
Route::post('/kejuaraan/pendaftar/hapus','KejuaraanController@deletePendaftar');
//absensi
Route::get('/kejuaraan/absensi/{id}','KejuaraanController@absensi');
Route::get('/kejuaraan/absensi/listTeam/{id}','KejuaraanController@listTeam');
Route::post('/kejuaraan/absensi/update','KejuaraanController@updateAbsensi');
Route::get('/kejuaraan/absensi/absensiall/{id}','KejuaraanController@absensiall');
//pemenang
Route::get('/kejuaraan/pemenang/{id}','KejuaraanController@pemenang');
// -------------------------------------- HOME -----------------------------------------------------
// Route::get('home', [HomeController::class, 'index']);
// Route::get('/', HomeController::class, 'index']);

// // ---------------------------------------------------------------------------------------------------

// // -------------------------------------- HALAMAN WEB -----------------------------------------------------
// Route::resource('berita', [ BeritaController::class ] );
// Route::resource('komentar', [ KomentarController::class ]);
// Route::resource('kejuaraan', [ KejuaraanController::class ]);
// Route::resource('infor', [ InfoController::class ]);
// Route::resource('tentanggabsi', [ TentangkamiController::class ]);
// Route::resource('galeri', [ GaleriController::class ]);
// Route::resource('prestasi', [ PrestasiController::class ]);
// //Route::resource('pendaftaran','PendaftaranController');

// // ---------------------- ROUTE INI DIPAKE KHUSUS USER UMUM ATAU YG GAPUNYA AKUN ----------------------------

// Route::get('/unberita', [PagesController::class, 'berita']);
// Route::get('/unberita/{idberita}', [PagesController::class, 'beritadetail']);
// Route::get('/unkomentar', [PagesController::class, 'showkomen']);
// Route::get('/unkejuaraan', [PagesController::class, 'kejuaraan']);
// Route::get('/ungaleri', [PagesController::class, 'galeri'] );
// Route::get('/ungaleri/{idevent}', [PagesController::class, 'galeridetail']);
// // ---------------------------------------------------------------------------------------------------

// // ------------------------ ROUTE INI DIPAKE KHUSUS USER YG AKUN -----------------------------------------------------
// Route::get('/eberita', [AkunController::class, 'berita']);
// Route::get('/eberita/{idberita}', [AkunController::class, 'beritadetail']);
// Route::post('/ekomentar', [AkunController::class, 'simpankomen']);
// Route::get('/ekejuaraan', [AkunController::class, 'kejuaraan']);
// Route::get('/egaleri', [AkunController::class, 'galeri']);
// Route::get('/einformasi', [AkunController::class, 'informasi']);
// Route::post('/esimpaninfo', [AkunController::class, 'simpaninfo']);
// // ---------------------------------------------------------------------------------------------------


// Route::resource('gabsi', [ GabsiController::class ]);
// Route::resource('pemaini', [ PemainController::class ]);
// Route::resource('struktur', [ StrukturController::class ]);
// Route::resource('jabatan', [ JabatanController::class ]);
// /*Route::resource('pengurus', 'PengurusController');*/
// Route::resource('kejuaraani', [ KejuaraanController::class ]);
// Route::resource('periode', [ PeriodeController::class ]);
// Route::resource('club', [ ClubController::class ]);
// Route::resource('user', [ UserController::class ]);
// Route::resource('detailkejuaraan', [ DetailKejuaraanController::class ]);



// Route::get('/sejarah', [TitipController::class, 'sejarah']);
// Route::get('/pengurus', [TitipController::class, 'pengurus']);
// Route::get('/pemain', [TitipController::class, 'pemain']);
// Route::get('/pusat', [TitipController::class, 'pusat']);
// Route::post('/detailpusat', [TitipController::class, 'detailpusat']);
// Route::post('/detailjatim', [TitipController::class, 'detailjatim']);
// Route::get('/anggotaclub/{id}', [TitipController::class, 'anggotaclub']);
// Route::get('/kab', [TitipController::class, 'kab']);

// Route::get('/kabkot', [TitipController::class, 'kabkot']);
// Route::get('/kabkotperiode/{id}', [TitipController::class, 'kabkotperiode']);
// Route::post('/detailkabkot', [TitipController::class, 'detailkabkot']);

// Route::get('/titip/kejuaraan', [TitipController::class, 'kejuaraan']);
// Route::get('/show/{id}', [TitipController::class, 'show']);
// Route::get('/hasilkejuaraan', [TitipController::class, 'hasilkejuaraan']);
// Route::get('/atlet', [TitipController::class, 'atlet']);
// Route::get('/jatim', [KabupatenController::class, 'index']);

//---------------------------------------- ADMIN -----------------------------------------------------------
// Route::post('/kejuaraan/createDetail','KejuaraanController@createDetailKejuaraan');

// //pendaftaran
// Route::get('/pendaftaran/kejuaraan','DetailKejuaraanController@listKejuaraan');
// Route::get('/pendaftaran/kejuaraan/formulirPendaftaran/{id}/{user}','DetailKejuaraanController@formulirPendaftaran')->name('pendaftaran.kejuaraan.formulirPendaftaran');
// //Route::post('/pendaftaran/kejuaraan/formulirPendaftaran','DetailKejuaraanController@UpdatePesertaAuto')->name('updatePesertaAutocomplete');
// Route::post('/pendaftaran/kejuaraan/storePendaftaran','DetailKejuaraanController@storePendaftaran')->name('pendaftaran.kejuaraan.storePendaftaran');
// //gabsi
// Route::get('/kejuaraan/pendaftar/listDiikuti','DetailKejuaraanController@listDiikuti');
// Route::get('/kejuaraan/pendaftar/listTeam/{id}','DetailKejuaraanController@listTeam');
// Route::get('/kejuaraan/pendaftar/bayar/{id}','DetailKejuaraanController@bayar');
// Route::post('/kejuaraan/pendaftar/submitbukti','DetailKejuaraanController@submitbukti');
// Route::get('/kejuaraan/pendaftar/pemenang/{id}','DetailKejuaraanController@pemenang');


// //pendaftaran
// Route::get('/kejuaraan/pendaftar/{id}','KejuaraanController@listPendaftar');
// Route::get('/kejuaraan/pendaftar/detail/{id}','KejuaraanController@detailPendaftar');
// Route::post('/kejuaraan/pendaftar/konfirmasibayar','KejuaraanController@konfirmasibayar');
// Route::post('/kejuaraan/pendaftar/hapus','KejuaraanController@deletePendaftar');
// //absensi
// Route::get('/kejuaraan/absensi/{id}','KejuaraanController@absensi');
// Route::get('/kejuaraan/absensi/listTeam/{id}','KejuaraanController@listTeam');
// Route::post('/kejuaraan/absensi/update','KejuaraanController@updateAbsensi');
// Route::get('/kejuaraan/absensi/absensiall/{id}','KejuaraanController@absensiall');
// //pemenang
// Route::get('/kejuaraan/pemenang/{id}','KejuaraanController@pemenang');
//-----------------------------------------------------------------------------------------------------------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
