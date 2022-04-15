<?php

use App\Http\Controllers\{DashboardController, GaleriController, IndexController, KaryaController, KaulController, KeluargaController, LoginController, MisiController, PendidikanController, PenghuniController, TugasController, UserController, VisiController};
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
    return view('auth.login', [
        'today' => $today,
    ]);
})->name('login')->middleware('guest');

Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home')->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::post('/loginprocess', 'loginprocess')->name('loginprocess')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('index')->middleware('auth');

//Penghuni
Route::controller(PenghuniController::class)->group(function () {
    Route::get('/penghuni', 'index')->name('index_penghuni')->middleware('auth');
    Route::get('/tambah-penghuni', 'create')->name('create_penghuni')->middleware('auth');
    Route::get('/createSlugPenghuni',  'checkSlug')->name('checkSlug_penghuni')->middleware(['auth']);
    Route::post('/addPenghuni',  'store')->name('store_penghuni')->middleware(['auth']);
    Route::get('/edit-penghuni/{slug}', 'edit')->name('edit_penghuni')->middleware('auth');
    Route::put('/editPenghuni/{slug}',  'update')->name('update_penghuni')->middleware(['auth']);
    Route::delete('/delete-penghuni/{slug}', 'destroy')->name('destroy_penghuni')->middleware(['auth']);
    Route::get('/detail-penghuni/{slug}', 'detail')->name('detail_penghuni')->middleware('auth');
});

//Kaul
Route::controller(KaulController::class)->group(function () {
    Route::get('/tambah-kaul/{slug}', 'create')->name('create_kaul')->middleware('auth');
    Route::get('/createSlugKaul',  'checkSlug')->name('checkSlug_kaul')->middleware(['auth']);
    Route::post('/addKaul',  'store')->name('store_kaul;')->middleware(['auth']);
    Route::get('/edit-kaul/{slug}', 'edit')->name('edit_kaul')->middleware('auth');
    Route::put('/updateKaul/{slug}',  'update')->name('update_kaul')->middleware(['auth']);
    Route::delete('/delete-kaul/{slug}', 'destroy')->name('destroy_kaul')->middleware(['auth']);
});

//Tugas
Route::controller(TugasController::class)->group(function () {
    Route::get('/tambah-tugas/{slug}', 'create')->name('create_tugas')->middleware('auth');
    Route::get('/createSlugTugas',  'checkSlug')->name('checkSlug_Tugas')->middleware(['auth']);
    Route::post('/addTugas',  'store')->name('store_tugas;')->middleware(['auth']);
    Route::get('/edit-tugas/{slug}', 'edit')->name('edit_tugas')->middleware('auth');
    Route::put('/updateTugas/{slug}',  'update')->name('update_tugas')->middleware(['auth']);
    Route::delete('/delete-tugas/{slug}', 'destroy')->name('destroy_tugas')->middleware(['auth']);
});

//Pendidikan
Route::controller(PendidikanController::class)->group(function () {
    Route::get('/tambah-pendidikan/{slug}', 'create')->name('create_pendidkan')->middleware('auth');
    Route::get('/createSlugPendidikan',  'checkSlug')->name('checkSlug_Pendidikan')->middleware(['auth']);
    Route::post('/addPendidikan',  'store')->name('store_pendidikan;')->middleware(['auth']);
    Route::get('/edit-pendidikan/{slug}', 'edit')->name('edit_pendidikan')->middleware('auth');
    Route::put('/updatePendidikan/{slug}',  'update')->name('update_pendidikan')->middleware(['auth']);
    Route::delete('/delete-pendidikan/{slug}', 'destroy')->name('destroy_pendidikan')->middleware(['auth']);
});

//Karya
Route::controller(KaryaController::class)->group(function () {
    Route::get('/tambah-karya/{slug}', 'create')->name('create_Karya')->middleware('auth');
    Route::get('/createSlugKarya',  'checkSlug')->name('checkSlug_Karya')->middleware(['auth']);
    Route::post('/addKarya',  'store')->name('store_Karya;')->middleware(['auth']);
    Route::get('/edit-karya/{slug}', 'edit')->name('edit_Karya')->middleware('auth');
    Route::put('/updateKarya/{slug}',  'update')->name('update_Karya')->middleware(['auth']);
    Route::delete('/delete-karya/{slug}', 'destroy')->name('destroy_Karya')->middleware(['auth']);
});

//Keluarga
Route::controller(KeluargaController::class)->group(function () {
    Route::get('/tambah-keluarga/{slug}', 'create')->name('create_Keluarga')->middleware('auth');
    Route::get('/createSlugKeluarga',  'checkSlug')->name('checkSlug_Keluarga')->middleware(['auth']);
    Route::post('/addKeluarga',  'store')->name('store_Keluarga;')->middleware(['auth']);
    Route::get('/edit-keluarga/{slug}', 'edit')->name('edit_Keluarga')->middleware('auth');
    Route::put('/updateKeluarga/{slug}',  'update')->name('update_Keluarga')->middleware(['auth']);
    Route::delete('/delete-keluarga/{slug}', 'destroy')->name('destroy_Keluarga')->middleware(['auth']);
});

//visi
Route::controller(VisiController::class)->group(function () {
    Route::get('/visi-misi', 'index')->name('index_Visi')->middleware('auth');
    Route::get('/tambah-visi', 'create')->name('create_Visi')->middleware('auth');
    Route::get('/createSlugVisi',  'checkSlug')->name('checkSlug_Visi')->middleware(['auth']);
    Route::post('/addVisi',  'store')->name('store_Visi;')->middleware(['auth']);
    Route::get('/edit-visi/{slug}', 'edit')->name('edit_Visi')->middleware('auth');
    Route::put('/updateVisi/{slug}',  'update')->name('update_Visi')->middleware(['auth']);
    // Route::delete('/delete-keluarga/{slug}', 'destroy')->name('destroy_Keluarga')->middleware(['auth']);
});

//Misi
Route::controller(MisiController::class)->group(function () {
    Route::get('/tambah-misi', 'create')->name('create_Misi')->middleware('auth');
    Route::get('/createSlugMisi',  'checkSlug')->name('checkSlug_Misi')->middleware(['auth']);
    Route::post('/addMisi',  'store')->name('store_Misi;')->middleware(['auth']);
    Route::get('/edit-misi/{slug}', 'edit')->name('edit_Misi')->middleware('auth');
    Route::put('/updateMisi/{slug}',  'update')->name('update_Misi')->middleware(['auth']);
    Route::delete('/delete-misi/{slug}', 'destroy')->name('destroy_Misi')->middleware(['auth']);
});

//Galeri
Route::controller(GaleriController::class)->group(function () {
    Route::get('/galeri', 'index')->name('index_Galeri')->middleware('auth');
    // Route::get('/createSlugMisi',  'checkSlug')->name('checkSlug_Misi')->middleware(['auth']);
    Route::post('/addGaleri',  'store')->name('store_Galeri;')->middleware(['auth']);
    // Route::get('/edit-misi/{slug}', 'edit')->name('edit_Misi')->middleware('auth');
    // Route::put('/updateMisi/{slug}',  'update')->name('update_Misi')->middleware(['auth']);
    Route::delete('/delete-imageGaleri/{slug}', 'destroy')->name('destroy_Galeri')->middleware(['auth']);
});


Route::controller(UserController::class)->group(function () {
    Route::get('/ganti-password', 'ganti_password')->name('ganti_password')->middleware('auth');
    Route::put('/updatePassword',  'update')->name('update_Password')->middleware(['auth']);
});

Route::controller(IndexController::class)->group(function () {

    Route::get('/', 'index')->name('index')->middleware('guest');
    Route::get('/sejarah', 'sejarah')->name('sejarah')->middleware('guest');
    Route::get('/about', 'about')->name('about')->middleware('guest');
    Route::get('/galeri-foto', 'galeri')->name('galeri')->middleware('guest');

    // Route::get('/', function () {
    //     $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
    //     return view('view_index.index', [
    //         'today' => $today,
    //         'judul' => 'Home',
    //     ]);
    // })->name('index');
});
