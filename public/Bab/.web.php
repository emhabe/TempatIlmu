<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuangbelajarController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
//tampilan awal
Route::get('/index', [RuangbelajarController::class, 'index'])->name('index');
Route::get('/about', [RuangbelajarController::class, 'about'])->name('about');
Route::get('/contact', [RuangbelajarController::class, 'contact'])->name('contact');
Route::get('/error', [RuangbelajarController::class, 'error'])->name('error');
Route::get('/panduan_guru', [RuangbelajarController::class, 'panduan_guru'])->name('panduan_guru');
Route::get('/panduan_siswa', [RuangbelajarController::class, 'panduan_siswa'])->name('panduan_siswa');

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
    Route::get('/detail_kelas', [AdminController::class, 'detail_kelas'])->name('detail_kelas');
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





//tampilan guru
Route::get('/dashboard_guru', [GuruController::class, 'dashboard_guru'])->name('dashboard_guru');
Route::get('/daftar_bab', [GuruController::class, 'daftar_bab'])->name('daftar_bab');
Route::get('/daftar_mapel_guru', [GuruController::class, 'daftar_mapel_guru'])->name('daftar_mapel_guru');
Route::get('/daftar_tugas_guru', [GuruController::class, 'daftar_tugas_guru'])->name('daftar_tugas_guru');
Route::get('/edit_bab', [GuruController::class, 'edit_bab'])->name('edit_bab');
Route::get('/edit_materi', [GuruController::class, 'edit_materi'])->name('edit_materi');
Route::get('/edit_profile_guru', [GuruController::class, 'edit_profile_guru'])->name('edit_profile_guru');
Route::get('/edit_tugas', [GuruController::class, 'edit_tugas'])->name('edit_tugas');
Route::get('/kelas', [GuruController::class, 'kelas'])->name('kelas');
Route::get('/lihat_materi_guru', [GuruController::class, 'lihat_materi_guru'])->name('lihat_materi_guru');
Route::get('/lihat_tugas_guru', [GuruController::class, 'lihat_tugas_guru'])->name('lihat_tugas_guru');
Route::get('/materi', [GuruController::class, 'materi'])->name('materi');
Route::get('/nilai', [GuruController::class, 'nilai'])->name('nilai');
Route::get('/profile_guru', [GuruController::class, 'profile_guru'])->name('profile_guru');
Route::get('/sign_in_guru', [GuruController::class, 'sign_in_guru'])->name('sign_in_guru');
Route::get('/sign_up_guru', [GuruController::class, 'sign_up_guru'])->name('sign_up_guru');
Route::get('/tambah_bab', [GuruController::class, 'tambah_bab'])->name('tambah_bab');
Route::get('/tambah_materi', [GuruController::class, 'tambah_materi'])->name('tambah_materi');
Route::get('/tambah_tugas', [GuruController::class, 'tambah_tugas'])->name('tambah_tugas');
Route::get('/tugas_guru', [GuruController::class, 'tugas_guru'])->name('tugas_guru');
Route::post('/insert_bab', [GuruController::class, 'insert_bab'])->name('insert_bab');

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
Route::get('/sign_in_siswa', [SiswaController::class, 'sign_in_siswa'])->name('sign_in_siswa');
Route::get('/sign_up_siswa', [SiswaController::class, 'sign_up_siswa'])->name('sign_up_siswa');
Route::get('/tugas_siswa', [SiswaController::class, 'tugas_siswa'])->name('tugas_siswa');
Route::get('/daftar_tugas_materi', [SiswaController::class, 'daftar_tugas_materi'])->name('daftar_tugas_materi');
Route::get('/view', [SiswaController::class, 'view'])->name('view');



Route::get('/dropzoneform', 'HomeController@dropzoneform');

//Rout for submitting the form datat
Route::post('/storedata', 'HomeController@storeData')->name('form.data');

//Route for submitting dropzone data
Route::post('/storeimgae', 'HomeController@storeImage');

Route::get('/', [SekolahController::class, 'dropzone']);
Route::post('dropzone/store', [SekolahController::class, 'dropzoneStore'])->name('dropzone.store');