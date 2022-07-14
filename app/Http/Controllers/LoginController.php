<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userguru;
use App\Models\usersiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function sign_in_admin()
    {
        return view('admin.sign_in_admin');
    }
    public function sign_up_admin()
    {
        return view('admin.sign_up_admin');
    }
    public function sign_up_useradmin(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),

        ]);

        return redirect('/sign_in_admin');
    }
    public function sign_in_prosesadmin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('dashboard_admin');
        }
        return \redirect('sign_in_admin');
    }
    public function sign_out_admin()
    {
        Auth::logout();
        return redirect('sign_in_admin');
    }
    public function sign_out_guru()
    {
        Auth::guard('userguru')->logout();
        return redirect('sign_in_guru');
    }
    public  function sign_up_prosesguru(Request $request)
    {

        $data = userguru::create([
            'nip' => $request->nip,
            'id_sekolah' => $request->id_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => implode(',', $request->kelas),
            'jurusan_id' => implode(',', $request->jurusan),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/sign_in_guru');
    }
    public function sign_in_prosesguru(Request $request)
    {
        if (Auth::guard('userguru')->attempt($request->only('nip', 'email', 'password'))) {
            return redirect('dashboard_guru');
        }

        return \redirect('sign_in_guru');
    }

    public function sign_up_usersiswa(Request $request)
    {

        $data = usersiswa::create([
            'nisn' => $request->nisn,
            'id_sekolah' => $request->id_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas,
            'jurusan_id' => $request->jurusan,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/sign_in_siswa');
    }
    public function sign_in_prosessiswa(Request $request)
    {
        if (Auth::guard('usersiswa')->attempt($request->only('nisn', 'email', 'password'))) {
            return redirect('dashboard_siswa');
        }

        return \redirect('sign_in_siswa');
    }
}
