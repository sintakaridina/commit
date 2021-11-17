<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\KonsumsiController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;


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
    return view('landing');
});

Auth::routes();


/*
---- Route Admin ------
Halaman : Login Admin, Dashboard Admin.
*/
Route::get('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'getLogin'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'postLogin']);
Route::middleware('auth:admin')->group(function(){
    Route::resource('user', UserController::class);
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('admin.home');
  });

  /*
---- Route Sekretaris ------
Halaman : Dashboard, New meeting, New meeting 2 (pelaksana), New meeting 3 (konsumsi),
          Re Schedule, Tracking.
*/
Route::resource('meets', MeetController::class);
Route::get('/sekret_dashboard', [App\Http\Controllers\MeetController::class, 'index'])->middleware('role:sekret')->name('sekret.dashboard');
Route::get('/sekret_tracking', [App\Http\Controllers\MeetController::class, 'tracking'])->middleware('role:sekret')->name('sekret.tracking');
Route::get('/sekret_tracking/{meet}', [App\Http\Controllers\MeetController::class, 'tracking2'])->middleware('role:sekret')->name('sekret.tracking2');
Route::get('/sekret_newmeet', [App\Http\Controllers\Sekret\DashboardController::class, 'new'])->middleware('role:sekret')->name('sekret.newmeet');
Route::post('/sekret_newmeet', [App\Http\Controllers\MeetController::class, 'store'])->middleware('role:sekret');
Route::get('/sekret_newmeet2', [App\Http\Controllers\MeetController::class, 'new2'])->middleware('role:sekret')->name('sekret.newmeet2');
Route::post('/sekret_newmeet2', [App\Http\Controllers\MeetController::class, 'storePelaksana'])->middleware('role:sekret');
Route::resource('konsumsi', KonsumsiController::class);
Route::get('/sekret_newmeet3', [App\Http\Controllers\KonsumsiController::class, 'index'])->middleware('role:sekret')->name('sekret.newmeet3');
Route::post('/sekret_newmeet3', [App\Http\Controllers\KonsumsiController::class, 'store'])->middleware('role:sekret');
Route::get('konsumsi/{id}/edit/','KonsumsiController@edit');
Route::get('/sekret_newdetails/{meet}', [App\Http\Controllers\MeetController::class, 'show'])->middleware('role:sekret')->name('sekret.newdetails');
Route::get('/sekret_start/{id}', [App\Http\Controllers\MeetController::class, 'start'])->middleware('role:sekret')->name('sekret.start');
Route::post('/sekret_start/{id}', [App\Http\Controllers\MeetController::class, 'startUpdate'])->middleware('role:sekret')->name('start');
Route::get('/sekret_delete/{id}', [App\Http\Controllers\MeetController::class, 'delete'])->middleware('role:sekret')->name('delete');
Route::get('/sekret_reschedule/{meet}/edit', [App\Http\Controllers\MeetController::class, 'edit'])->middleware('role:sekret')->name('sekret.reschedule');
Route::put('/sekret_reschedule/{meet}', [App\Http\Controllers\MeetController::class, 'update'])->middleware('role:sekret')->name('sekret.update');
Route::get('/mail-send/{id}', [App\Http\Controllers\MeetController::class, 'mailSend'])->middleware('role:sekret')->name('sent-email');
Route::get('/sekret_meet/{meet}/next', [App\Http\Controllers\MeetController::class, 'next'])->middleware('role:sekret')->name('sekret.nextmeet');
Route::post('/sekret_meet/{meet}/next', [App\Http\Controllers\MeetController::class, 'storeNext'])->middleware('role:sekret');
Route::get('/sekret_download/{note}', [App\Http\Controllers\NoteController::class, 'download'])->middleware('role:sekret')->name('sekret.download');
/*
---- Route Notulen ------
Halaman : Dashboard, New Note, Edit Note.
*/
Route::get('/notulen_dashboard', [App\Http\Controllers\NoteController::class, 'index'])->middleware('role:notulen')->name('notulen.dashboard');
Route::get('/notulen_newnote/{meet}', [App\Http\Controllers\NoteController::class, 'create'])->middleware('role:notulen')->name('notulen.newnote');
Route::post('/notulen_newnote', [App\Http\Controllers\NoteController::class, 'store'])->middleware('role:notulen')->name('note.store');
Route::get('/notulen_editnote/{note}/edit', [App\Http\Controllers\NoteController::class, 'edit'])->middleware('role:notulen')->name('notulen.editnote');
Route::put('/notulen_editnote/{note}', [App\Http\Controllers\NoteController::class, 'update'])->middleware('role:notulen')->name('notulen.update');
Route::get('/notulen_delete/{note}', [App\Http\Controllers\NoteController::class, 'destroy'])->middleware('role:notulen')->name('notulen.delete');
Route::post('/rec_edit/{meet}', [App\Http\Controllers\NoteController::class, 'recStore'])->middleware('role:notulen')->name('rec.store');

/*
---- Route Pimpinan ------
Halaman : Dashboard, Show Note.
*/
Route::get('/pimpinan_dashboard', [App\Http\Controllers\NoteController::class, 'indexPimpinan'])->middleware('role:pimpinan')->name('pimpinan.dashboard');
Route::get('/pimpinan_shownote/{note}', [App\Http\Controllers\NoteController::class, 'show'])->middleware('role:pimpinan')->name('pimpinan.shownote');
Route::get('/pimpinan_verifikasi/{note}', [App\Http\Controllers\NoteController::class, 'verifikasi'])->middleware('role:pimpinan')->name('pimpinan.verifikasi');
Route::get('/pimpinan_tolak/{note}', [App\Http\Controllers\NoteController::class, 'tolak'])->middleware('role:pimpinan')->name('pimpinan.tolak');

/*
---- Route Peserta ------
Halaman : Dashboard, Show Note.
*/
Route::get('/peserta_dashboard', [App\Http\Controllers\NoteController::class, 'indexPeserta'])->middleware('role:peserta')->name('peserta.dashboard');
Route::get('/peserta_shownote/{note}', [App\Http\Controllers\NoteController::class, 'show'])->middleware('role:peserta')->name('peserta.shownote');
Route::get('/peserta_showmeet/{meet}', [App\Http\Controllers\NoteController::class, 'showMeet'])->middleware('role:peserta')->name('peserta.showmeet');
Route::get('/peserta_download/{note}', [App\Http\Controllers\NoteController::class, 'download'])->middleware('role:peserta')->name('peserta.download');