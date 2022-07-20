<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuangbelajarController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
//tampilan awal
Route::get('/', [RuangbelajarController::class, 'index'])->name('index');
Route::get('/about', [RuangbelajarController::class, 'about'])->name('about');
Route::get('/contact', [RuangbelajarController::class, 'contact'])->name('contact');
Route::get('/error', [RuangbelajarController::class, 'error'])->name('error');
Route::get('/panduan_guru', [RuangbelajarController::class, 'panduan_guru'])->name('panduan_guru');
Route::get('/panduan_siswa', [RuangbelajarController::class, 'panduan_siswa'])->name('panduan_siswa');
Route::get('/cara_login', [RuangbelajarController::class, 'cara_login'])->name('cara_login');

// login admin
Route::get('/sign_in_admin', [LoginController::class, 'sign_in_admin'])->name('admin.sign_in_admin');
Route::post('/sign_in_prosesadmin', [LoginController::class, 'sign_in_prosesadmin'])->name('sign_in_prosesadmin');
Route::get('/sign_up_admin', [LoginController::class, 'sign_up_admin'])->name('sign_up_admin');
Route::post('/sign_up_useradmin', [LoginController::class, 'sign_up_useradmin'])->name('sign_up_useradmin');
Route::get('/sign_out_admin', [LoginController::class, 'sign_out_admin'])->name('sign_out_admin');
//edit profile admin
Route::get('/edit_profile_admin', [AdminController::class, 'edit_profile_admin'])->name('edit_profile_admin');
Route::post('/update_profile_admin', [AdminController::class, 'update_profile_admin'])->name('update_profile_admin');
//tampilan admin 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard_admin', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin')->middleware('auth');
    Route::get('/profile_admin', [AdminController::class, 'profile_admin'])->name('profile_admin');
    Route::get('/detail_guru', [AdminController::class, 'detail_guru'])->name('detail_guru');
    Route::get('/detail_kelas/{id_sekolah}', [AdminController::class, 'detail_kelas'])->name('detail_kelas');
    Route::get('/detail_sekolah/{id_sekolah}', [AdminController::class, 'detail_sekolah'])->name('detail_sekolah');
    Route::get('/detail_siswa', [AdminController::class, 'detail_siswa'])->name('detail_siswa');
    Route::get('/edit_data_sekolah/{id_sekolah}', [AdminController::class, 'edit_data_sekolah'])->name('edit_data_sekolah');
    Route::get('/tambah_data_sekolah', [AdminController::class, 'tambah_data_sekolah'])->name('tambah_data_sekolah');
    Route::get('/tambah_sekolah', [AdminController::class, 'tambah_sekolah'])->name('tambah_sekolah');
    Route::post('/insert_sekolah', [AdminController::class, 'insert_sekolah'])->name('insert_sekolah');
    Route::get('/hapus_sekolah', [AdminController::class, 'hapus_sekolah'])->name('hapus_sekolah');
    Route::get('/delete_sekolah/{id_sekolah}', [AdminController::class, 'delete_sekolah'])->name('delete_sekolah');
    Route::post('/update_sekolah/{id_sekolah}', [AdminController::class, 'update_sekolah'])->name('update_sekolah');
});
//proses login guru
Route::get('/sign_in_guru', [GuruController::class, 'sign_in_guru'])->name('sign_in_guru');
Route::post('/sign_in_prosesguru', [LoginController::class, 'sign_in_prosesguru'])->name('sign_in_prosesguru');
Route::get('/sign_up_guru', [GuruController::class, 'sign_up_guru'])->name('sign_up_guru');
Route::post('/sign_up_prosesguru', [LoginController::class, 'sign_up_prosesguru'])->name('sign_up_prosesguru');
Route::get('/sign_out_guru', [LoginController::class, 'sign_out_guru'])->name('sign_out_guru');

//edit profile guru
Route::post('/update_profile_guru', [GuruController::class, 'update_profile_guru'])->name('update_profile_guru');


//proses login siswa
Route::get('/sign_in_siswa', [SiswaController::class, 'sign_in_siswa'])->name('sign_in_siswa');
Route::post('/sign_up_usersiswa', [LoginController::class, 'sign_up_usersiswa'])->name('sign_up_usersiswa');
Route::get('/sign_up_siswa', [SiswaController::class, 'sign_up_siswa'])->name('sign_up_siswa');
Route::post('/sign_in_prosessiswa', [LoginController::class, 'sign_in_prosessiswa'])->name('sign_in_prosessiswa');
//tampilan guru

Route::get('/dashboard_guru', [GuruController::class, 'dashboard_guru'])->name('dashboard_guru');
Route::get('/daftar_bab/{id}', [GuruController::class, 'daftar_bab'])->name('daftar_bab');
Route::get('/daftar_mapel_guru', [GuruController::class, 'daftar_mapel_guru'])->name('daftar_mapel_guru');
Route::get('/daftar_tugas_guru', [GuruController::class, 'daftar_tugas_guru'])->name('daftar_tugas_guru');
Route::get('/edit_bab/{id}', [GuruController::class, 'edit_bab'])->name('edit_bab');
Route::get('/edit_materi', [GuruController::class, 'edit_materi'])->name('edit_materi');
Route::get('/edit_profile_guru', [GuruController::class, 'edit_profile_guru'])->name('edit_profile_guru');
Route::get('/edit_tugas/{bab_id}/{tugas_id}', [GuruController::class, 'edit_tugas'])->name('edit_tugas');
Route::get('/kelas', [GuruController::class, 'kelas'])->name('kelas');
Route::get('/lihat_materi_guru', [GuruController::class, 'lihat_materi_guru'])->name('lihat_materi_guru');
Route::get('/lihat_tugas_guru/{id}', [GuruController::class, 'lihat_tugas_guru'])->name('lihat_tugas_guru');
Route::get('/materi', [GuruController::class, 'materi'])->name('materi');
Route::get('/nilai', [GuruController::class, 'nilai'])->name('nilai');
Route::get('/profile_guru', [GuruController::class, 'profile_guru'])->name('profile_guru');
Route::get('/tambah_bab/{id}', [GuruController::class, 'tambah_bab'])->name('tambah_bab');
Route::get('/tambah_materi', [GuruController::class, 'tambah_materi'])->name('tambah_materi');
Route::get('/tugas_guru/{id}', [GuruController::class, 'tugas_guru'])->name('tugas_guru');
Route::get('/tambah_tugas/{id}', [GuruController::class, 'tambah_tugas'])->name('tambah_tugas');
Route::post('/update_bab/{id}', [GuruController::class, 'update_bab'])->name('update_bab');
Route::get('/delete_bab/{id}/{idmapel}', [GuruController::class, 'delete_bab'])->name('delete_bab');
Route::get('/tugas_guru/{id}', [GuruController::class, 'tugas_guru'])->name('tugas_guru');
Route::post('/insert_tugas/{id}', [GuruController::class, 'insert_tugas'])->name('insert_tugas');
Route::post('/insert_bab/{id}', [GuruController::class, 'insert_bab'])->name('insert_bab');
Route::get('/delete_tugas/{id}/{idbab}', [GuruController::class, 'delete_tugas'])->name('delete_tugas');
Route::post('/update_tugas/{id}', [GuruController::class, 'update_tugas'])->name('update_tugas');
Route::get('/tambah_mapel', [GuruController::class, 'tambah_mapel'])->name('tambah_mapel');
Route::post('/insert_mapel', [GuruController::class, 'insert_mapel'])->name('insert_mapel');
Route::get('/delete_mapel/{id}', [GuruController::class, 'delete_mapel'])->name('delete_mapel');
Route::post('/update_mapel/{id}', [GuruController::class, 'update_mapel'])->name('update_mapel');
Route::get('/daftar_mapel_tugas', [GuruController::class, 'daftar_mapel_tugas'])->name('daftar_mapel_tugas');

//tampilan siswa
Route::get('/dashboard_siswa', [SiswaController::class, 'dashboard_siswa'])->name('dashboard_siswa');
Route::get('/buka_bab', [SiswaController::class, 'buka_bab'])->name('buka_bab');
Route::get('/buka_tugas', [SiswaController::class, 'buka_tugas'])->name('buka_tugas');
Route::get('/daftar_mapel_siswa', [SiswaController::class, 'daftar_mapel_siswa'])->name('daftar_mapel_siswa');
Route::get('/daftar_materi_tugas', [SiswaController::class, 'daftar_materi_tugas'])->name('daftar_materi_tugas');
Route::get('/daftar_tugas_siswa', [SiswaController::class, 'daftar_tugas_siswa'])->name('daftar_tugas_siswa');
Route::get('/edit_profile_siswa', [SiswaController::class, 'edit_profile_siswa'])->name('edit_profile_siswa');
Route::get('/lihat_bab', [SiswaController::class, 'lihat_bab'])->name('lihat_bab');
Route::get('/lihat_materi_siswa', [SiswaController::class, 'lihat_materi_siswa'])->name('lihat_materi_siswa');
Route::get('/lihat_tugas_siswa', [SiswaController::class, 'lihat_tugas_siswa'])->name('lihat_tugas_siswa');
Route::get('/materi_siswa', [SiswaController::class, 'materi_siswa'])->name('materi_siswa');
Route::get('/profile_siswa', [SiswaController::class, 'profile_siswa'])->name('profile_siswa');
Route::get('/tugas_siswa', [SiswaController::class, 'tugas_siswa'])->name('tugas_siswa');
Route::get('/daftar_tugas_materi', [SiswaController::class, 'daftar_tugas_materi'])->name('daftar_tugas_materi');
Route::get('/view', [SiswaController::class, 'view'])->name('view');
Route::post('/insert_tugas_siswa', [SiswaController::class, 'insert_tugas_siswa'])->name('insert_tugas_siswa');
