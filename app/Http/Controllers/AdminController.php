<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfile;
use App\Models\User;
use App\Models\sekolah;
use Illuminate\Http\Request;
use App\Models\userguru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //tampilan admin
    public function dashboard_admin()
    {

        $guru = userguru::count();
        $data = sekolah::count();
        return view('admin.dashboard_admin', compact('data', 'guru'));
    }
    public function profile_admin()
    {
        $data = user::all();
        return view('admin.profile_admin', compact('data'));
    }
    public function tambah_sekolah(Request $request)
    {
        $guru = userguru::count();
        if ($request->has('search')) {
            $data = sekolah::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(4)->count();
        } else {
            $total = sekolah::count();
            $data = sekolah::paginate(4);
        }

        return view('admin.tambah_sekolah', compact('data', 'total', 'guru'));
    }
    public function tambah_data_sekolah()
    {
        return view('admin.tambah_data_sekolah');
    }
    public function detail_sekolah($id)
    {
        $count = userguru::where('sekolah_id', '=', $id)->count();
        $data = sekolah::where('id', $id)->first();
        return view('admin.detail_sekolah', compact('data', 'count'));
    }
    public function edit_data_sekolah($id)
    {
        $data = sekolah::find($id);
        $data = sekolah::where('id', $id)->first();
        return view('admin.edit_data_sekolah', compact('data'));
    }
    public function hapus_sekolah()
    {
        $data = sekolah::paginate(5);
        return view('admin.hapus_sekolah', compact('data'));
    }
    public function insert_sekolah(Request $request)
    {
        //dd($request->all());
        //$data =sekolah::create($request->all());
        $data = sekolah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'foto' => $request->foto,

        ]);
        if ($request->hasfile('foto')) {
            $request->file('foto')->move('fotosekolah/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('tambah_sekolah')->with('succes', 'Data Berhasil Di Tambahkan !');
    }
    //delete sekolah proses
    public function delete_sekolah($id)
    {
        $data = sekolah::find($id);
        $data->delete();
        return redirect('hapus_sekolah')->with('succes', 'Data Berhasil Di Hapus !');
    }
    //proses update
    public function update_sekolah(Request $request, $id)
    {
        $data = sekolah::all();
        $data = sekolah::where('id', $id)->first();
        $data->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        if ($request->hasfile('foto')) {
            $request->file('foto')->move('fotosekolah/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('detail_sekolah/' . $id)->with('succes', 'Data Berhasil Di Update !');
    }
    public function detail_kelas($id)
    {
        $data = sekolah::where('id', $id)->first();
        return view('admin.detail_kelas', compact('data'));
    }
    public function detaiL_guru()
    {
        return view('admin.detaiL_guru');
    }
    public function detail_siswa()
    {
        return view('admin.detail_siswa');
    }
    //edit profile admin
    public function edit_profile_admin()
    {

        return view('admin.edit_profile_admin',);
    }

    public function update_profile_admin(UpdateProfile $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'foto' => $request->file('foto'),
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto_admin', $request->file('foto')->getClientOriginalName());
            $user['foto'] = $request->file('foto')->getClientOriginalName();
            $user->save();
        }
        return redirect('profile_admin');
    }
    //akhir edit profile
}
