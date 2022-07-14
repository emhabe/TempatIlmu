<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function dashboard_siswa()
    {
        return view('pages.dashboard_siswa');
    }
    public function buka_bab()
    {
        return view('pages.buka_bab');
    }
    public function buka_tugas()
    {
        return view('pages.buka_tugas');
    }
    public function daftar_mapel_siswa()
    {
        return view('pages.daftar_mapel_siswa');
    }
    public function daftar_materi_tugas()
    {
        return view('pages.daftar_materi_tugas');
    }
    public function daftar_tugas_siswa()
    {
        return view('pages.daftar_tugas_siswa');
    }
    public function edit_profile_siswa()
    {
        return view('pages.edit_profile_siswa');
    }
    public function lihat_bab()
    {
        return view('pages.lihat_bab');
    }
    public function lihat_materi_siswa()
    {
        return view('pages.lihat_materi_siswa');
    }
    public function materi_siswa()
    {
        return view('pages.materi_siswa');
    }
    public function profile_siswa()
    {
        return view('pages.profile_siswa');
    }
    public function sign_in_siswa()
    {
        return view('pages.sign_in_siswa');
    }
    public function sign_up_siswa()
    {
        $data = [
            'kelas' => Kelas::all(),
            'jurusan' => Jurusan::all(),
        ];
        return view('pages.sign_up_siswa', compact('data'));
    }
    public function tugas_siswa()
    {
        return view('pages.tugas_siswa');
    }
    public function daftar_tugas_materi()
    {
        return view('pages.daftar_tugas_materi');
    }
    public function view()
    {
        return view('pages.view');
    }
    public function lihat_tugas_siswa()
    {
        return view('pages.lihat_tugas_siswa');
    }
}
