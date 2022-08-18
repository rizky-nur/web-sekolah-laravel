<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\regcontroller;
use App\Http\Controllers\dashboardpostcontroller;
use App\Http\Controllers\dashboardjurusancontroller;
use App\Http\Controllers\dashboardvimicontroller;
use App\Http\Controllers\dashboardsejarahcontroller;
use App\Http\Controllers\sambutancontroller;
use App\Http\Controllers\dashboardgalerycontroller;
use App\Http\Controllers\dashboardperpuscontroller;
use App\Http\Controllers\dashboardprofilcontroller;
use App\Http\Controllers\dashboardpengumumancontroller;
use App\Http\Controllers\dashboardstrukturcontroller;
use App\Http\Controllers\dashboardbkkcontroller;
use App\Http\Controllers\dashboardgurucontroller;
use App\Http\Controllers\dashboardsiswacontroller;
use App\Http\Controllers\dashboardppdbcontroller;
use App\Http\Controllers\dashboardcontactcontroller;
use App\Http\Controllers\dashboardosiscontroller;
use App\Http\Controllers\dashboardmpkcontroller;
use App\Http\Controllers\dashboardpkscontroller;
use App\Models\berita;
use App\Models\profile;
use App\Models\pengumuman;
use App\Models\sambutan;
use App\Models\sejarah;
use App\Models\VisiMisi;
use App\Models\struktur;
use App\Models\perpust;
use App\Models\guru;
use App\Models\siswa;
use App\Models\bkk;
use App\Models\ppdb;
use App\Models\galery;
use App\Models\contact;
use App\Models\jurusan;
use App\Models\mpk;
use App\Models\osis;
use App\Models\pks;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('index',[
        'beritas' => berita::all(),
        'profiles' => profile::all(),
        'pengumumans' => pengumuman::all(),
        'sambutans' => sambutan::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/profile', function () {
    return view('profil',[
        'sejarahs' => sejarah::all(),
        'visimisis' => visimisi::all(),
        'strukturs' => struktur::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/guru', function () {
    return view('guru',[
        'gurus' => guru::paginate(15),
        'contacts' => contact::all()
    ]);
});
Route::get('/guruberprestasi', function () {
    return view('guruGG',[
        'gurus' => guru::limit(10)->get(),
        'contacts' => contact::all()
    ]);
});
Route::get('/siswa', function () {
    return view('siswa',[
        'siswas' => siswa::search(request(['search']))->paginate(15)->withQueryString(),
        'jurusans' => jurusan::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/perpustakaan', function () {
    return view('perpustakaan',[
        'perpust' => perpust::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/bkk', function () {
    return view('bkk',[
        'bkks' => bkk::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/osis', function () {
    return view('osis',[
        'osiss' => DB::table('oses')->orderBy('id', 'desc')
        ->get(),
        'contacts' => contact::all()
    ]);
});
Route::get('/pks', function () {
    return view('pks',[
        'pkss' => pks::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/mpk', function () {
    return view('mpk',[
        'mpks' => mpk::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/sis', function () {
    return view('sis',[
        'contacts' => contact::all()
    ]);
});
Route::get('/ppdb', function () {
    return view('ppdb',[
        'ppdbs' => ppdb::all(),
        'contacts' => contact::all()
    ]);
});
Route::get('/galery', function () {
    return view('galery',[
        'galerys' => galery::paginate(4),
        'contacts' => contact::all(),
        'jurusans' => jurusan::all()
    ]);
});
Route::get('/galery/{jurusan_name:jurusan_name}', function ($jurusan_name) {
    $jurusan = jurusan::firstWhere('jurusan_name',$jurusan_name);
    return view('category_galery',[
        'title' => 'category galery',
        'galerys' => galery::where('jurusan_id',$jurusan->id)->get(),
        'contacts' => contact::all(),
    ]);
});
Route::get('/login', function () {
    return view('login.login',[
        'title' => 'Login'
    ]);
})->name('login')->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard.index',[
        'title' => 'Dashboard',
        'contacts' => contact::all()
    ]);
});
Route::get('/pencarian/hasil', function () {
    return view('cari',[
        'title' => 'hasil pencarian',
        'contacts' => contact::all(),
        'beritas' => berita::search(request(['search']))->paginate(36)->withQueryString(),
    ]);
});
Route::get('/pengumuman/read/{slug}', function ($slug) {
    return view('pengumuman',[
        'title' => 'pengumuman',
        'contacts' => contact::all(),
        'pengumuman' => pengumuman::firstWhere('slug', $slug)
    ]);
});
Route::get('/berita/read/{slug}', function ($slug) {
    return view('berita',[
        'title' => 'rekruitmen-semar-nusantara',
        'contacts' => contact::all(),
        'berita' => berita::firstWhere('slug', $slug)
    ]);
});

Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/LogOut', [LoginController::class, 'logout']); 

route::resource('/dashboard/berita', dashboardpostcontroller::class)->middleware('auth');
route::resource('/dashboard/sambutan', sambutancontroller::class)->middleware('auth');
route::resource('/dashboard/jurusan', dashboardjurusancontroller::class)->middleware('auth');
route::resource('/dashboard/VisiMisi', dashboardvimicontroller::class)->middleware('auth');
route::resource('/dashboard/sejarah', dashboardsejarahcontroller::class)->middleware('auth');
route::resource('/dashboard/galery', dashboardgalerycontroller::class)->middleware('auth');
route::resource('/dashboard/perpus', dashboardperpuscontroller::class)->middleware('auth');
route::resource('/dashboard/profile', dashboardprofilcontroller::class)->middleware('auth');
route::resource('/dashboard/pengumuman', dashboardpengumumancontroller::class)->middleware('auth');
route::resource('/dashboard/struktur', dashboardstrukturcontroller::class)->middleware('auth');
route::resource('/dashboard/bkk', dashboardbkkcontroller::class)->middleware('auth');
route::resource('/dashboard/guru', dashboardgurucontroller::class)->middleware('auth');
route::resource('/dashboard/siswa', dashboardsiswacontroller::class)->middleware('auth');
route::resource('/dashboard/ppdb', dashboardppdbcontroller::class)->middleware('auth');
route::resource('/dashboard/contact', dashboardcontactcontroller::class)->middleware('auth');
route::resource('/dashboard/osis', dashboardosiscontroller::class)->middleware('auth');
route::resource('/dashboard/mpk', dashboardmpkcontroller::class)->middleware('auth');
route::resource('/dashboard/pks', dashboardpkscontroller::class)->middleware('auth');