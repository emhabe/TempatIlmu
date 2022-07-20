<?php

namespace App\Http\Controllers;

use App\Models\Tugas_siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

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
        $datatugas = Tugas_siswa::all();
        return view('pages.view', compact('datatugas'));
    }
    public function lihat_tugas_siswa()
    {
        return view('pages.lihat_tugas_siswa');
    }
    public function insert_tugas_siswa(Request $request)
    {
        $datatugas = array();
        if ($files = $request->file('upload_tugas')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $datatugas_full_name = '.' . $ext;
                $upload_path = 'storage_tugas/';
                $datatugas_url = $upload_path . $datatugas_full_name;
                $file->move($upload_path, $datatugas_full_name);
                $datatugas[] = $datatugas_url;
            }
        }
        Tugas_siswa::create([
            'upload_tugas' => implode('-', $datatugas),
        ]);
        // $datatugas = Tugas_siswa::create([
        //     'upload_tugas' => $request->upload_tugas,

        // ]);
        // if ($request->hasfile('upload_tugas')) {
        //     $request->file('upload_tugas')->move('storage_tugas/', $request->file('upload_tugas')->getClientOriginalName());
        //     $datatugas->upload_tugas = $request->file('upload_tugas')->getClientOriginalName();
        //     $datatugas->save();
        // }
        return redirect('view');
    }
}
