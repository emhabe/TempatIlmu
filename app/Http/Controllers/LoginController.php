<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userguru;
use App\Models\usersiswa;
use App\Models\Kelas;
use App\Models\usergurus_jurusan;
use App\Models\usergurus_kelas;
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
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required',
            'password' => 'required',

        ]);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),

        ]);

        return redirect('/sign_in_admin')->with('pesan', 'Anda Berhasil Register');;
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
        return redirect('sign_in_admin')->with('logout', 'Anda Berhasil Log Out');
    }
    public function sign_out_guru()
    {
        Auth::guard('userguru')->logout();
        return redirect('sign_in_guru')->with('logout', 'Anda Berhasil Log Out');
    }
    public  function sign_up_prosesguru(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|min:2|max:255',
        //     'email' => 'required',
        //     'password' => 'required|min:8|max:100',
        // ]);
        $id = userguru::create([
            'nip' => $request->nip,
            'id_sekolah' => $request->id_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            // 'kelas_id' => implode(',', $request->kelas),
            // 'jurusan_id' => implode(',', $request->jurusan),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ])->id;




        $kelas = Kelas::all();
        foreach ($kelas as $kls) {
            $req = 'jurusan' . $kls->id;
            $datas = $request->$req;

            if ($datas) {
                usergurus_kelas::create([
                    'kelas_id' => $kls->id,
                    'usergurus_id' => $id,
                ]);
                foreach ($datas as $k) {
                    usergurus_jurusan::create([
                        'jurusan_id' => $k,
                        'usergurus_id' => $id,
                        'kelas_id' =>  $kls->id,
                    ]);
                }
            }
        }

        return redirect('/sign_in_guru')->with('pesan', 'Anda Berhasil Register');
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
        // $validatedData = $request->validate([
        //     'name' => 'required|min:2|max:255',
        //     'email' => 'required',
        //     'password' => 'required|min:8|max:100',



        // ]);

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

        return redirect('/sign_in_siswa')->with('pesan', 'Anda Berhasil Register');;
    }
    public function sign_in_prosessiswa(Request $request)
    {
        if (Auth::guard('usersiswa')->attempt($request->only('nisn', 'email', 'password'))) {
            return redirect('dashboard_siswa');
        }

        return \redirect('sign_in_siswa');
    }
}
