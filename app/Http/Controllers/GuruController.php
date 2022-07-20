<?php

namespace App\Http\Controllers;

use App\Http\Middleware\guru;
use App\Http\Requests\Users\UserguruUpdate;
use App\Models\Bab;
use App\Models\sekolah;
use App\Models\usergurus_kelas;
use App\Models\usergurus_jurusan;
use App\Models\Mapel;
use App\Models\userguru;
use App\Models\Tugas;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function bab()
    {
        return view('guru.bab');
    }
    public function dashboard_guru()
    {
        $data = userguru::with('usergurus_jurusan', 'usergurus_kelas')->where('id', '=', Auth::guard('userguru')->user()->id)->get();
        return view('guru.dashboard_guru', compact('data'));
    }
    public function daftar_bab(Request $request, $id)
    {
        if ($request->has('search')) {
            $datamapel = Mapel::where('id', $id)->first();
            $data = Bab::with('mapel')->where('mapel_id', "=", $id)->where('judul', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $datamapel = Mapel::where('id', $id)->first();
            $data = Bab::with('mapel')->where('mapel_id', "=", $id)->paginate(5);
        }
        return view('guru.daftar_bab', compact('data', 'datamapel'));
    }
    public function daftar_mapel_guru(Request $request)
    {
        if ($request->has('search')) {
            $datamapel = Mapel::where('nama_mapel', 'LIKE', '%' . $request->search . '%')->paginate(6);
        } else {
            $datamapel = Mapel::all();
            $datamapel = Mapel::paginate(6);
        }
        return view('guru.daftar_mapel_guru', compact('datamapel'));
    }
    public function daftar_tugas_guru()
    {
        return view('guru.daftar_tugas_guru');
    }
    public function edit_bab($id)
    {
        $data = Bab::find($id);
        return view('guru.edit_bab', compact('data'));
    }
    public function edit_materi()
    {
        return view('guru.edit_materi');
    }
    public function edit_profile_guru()
    {
        $data = [
            'kelas' => Kelas::all(),
            'jurusan' => Jurusan::all(),
        ];
        return view('guru.edit_profile_guru', compact('data'));
    }
    public function update_profile_guru(Request $request)
    {

        $user = userguru::find(Auth::guard('userguru')->user()->id);
        $input = $request->all();
        $input['jurusan_id'] = implode(',', $request->input('jurusan'));
        $input['kelas_id'] = implode(',', $request->input('kelas'));

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto_guru', $request->file('foto')->getClientOriginalName());
            $user['foto'] = $request->file('foto')->getClientOriginalName();
            $user->save();
        }
        $user->update($input);
        return redirect('profile_guru');
    }
    public function edit_tugas($bab_id, $tugas_id)
    {
        $data = Bab::find($bab_id);
        $datatugas = Tugas::with('bab')->find($tugas_id);
        return view('guru.edit_tugas', compact('datatugas', 'data'));
    }
    public function kelas()
    {
        return view('guru.kelas');
    }
    public function lihat_materi_guru()
    {
        return view('guru.lihat_materi_guru');
    }
    public function lihat_tugas_guru(Request $request, $id)
    {
        if ($request->has('search')) {
            $data = Bab::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $datamapel = Mapel::where('id', $id)->first();
            $data = Bab::with('mapel')->where('mapel_id', "=", $id)->paginate(5);
        }
        return view('guru.lihat_tugas_guru', compact('data', 'datamapel'));
    }
    public function materi()
    {
        return view('guru.materi');
    }
    public function nilai()
    {
        return view('guru.nilai');
    }

    public function profile_guru()
    {
        $data = userguru::all();
        return view('guru.profile_guru', compact('data'));
    }
    public function sign_in_guru()
    {
        return view('guru.sign_in_guru');
    }
    public function sign_up_guru()
    {
        $data = [
            'kelas' => Kelas::all(),
            'jurusan' => Jurusan::all(),
        ];
        return view('guru.sign_up_guru', compact('data'));
    }
    public function tambah_bab($id)
    {
        $datamapel = Mapel::find($id);
        $datamapel = Mapel::where('id', $id)->first();
        return view('guru.tambah_bab', compact('datamapel'));
    }
    public function tambah_materi()
    {
        return view('guru.tambah_materi');
    }
    public function tambah_tugas($id)
    {
        $data = Bab::find($id);
        $data = Bab::where('id', $id)->first();
        return view('guru.tambah_tugas', compact('data'));
    }

    public function tugas_guru(Request $request, $id)
    {
        if ($request->has('search')) {
            $data = Bab::where('id', $id)->first();
            $datatugas = Tugas::with('bab')->where('bab_id', "=", $id)->where('nama_tugas', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $datamapel = Mapel::where('id', $id)->first();
        } else {
            $data = Bab::with('mapel')->where('id', $id)->first();
            $datatugas = Tugas::with('bab')->where('bab_id', "=", $id)->paginate(5);
            $datamapel = Mapel::where('id', $id)->first();
        }
        return view('guru.tugas_guru', compact('datatugas', 'data', 'datamapel'));
    }
    public function insert_bab(Request $request, $id)
    {
        $data = Bab::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'bab_file' => $request->bab_file,
            'mapel_id' => $id,

        ]);
        if ($request->hasfile('bab_file')) {
            $request->file('bab_file')->move('Bab/', $request->file('bab_file')->getClientOriginalName());
            $data->bab_file = $request->file('bab_file')->getClientOriginalName();
            $data->save();
        }
        return redirect('daftar_bab/' . $id)->with('succes', 'Data Berhasil Di Tambahkan !');
    }
    public function update_bab(Request $request, $id)
    {
        $data = Bab::find($id);
        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'mapel_id' => $request->mapel_id,


        ]);
        if ($request->hasfile('bab_file')) {
            $request->file('bab_file')->move('Bab/', $request->file('bab_file')->getClientOriginalName());
            $data->bab_file = $request->file('bab_file')->getClientOriginalName();
            $data->save();
        }
        return redirect('daftar_bab/' . $request->mapel_id)->with('succes', 'Data Berhasil Di Update !');
    }
    public function delete_bab($id, $idmapel)
    {
        $datatugas = Tugas::with('bab')->where('bab_id', '=', $id);
        $data = Bab::find($id);
        $data->delete();
        $datatugas->delete();
        return redirect('daftar_bab/' . $idmapel)->with('succes', 'Data Berhasil Di Hapus !');
    }
    public function insert_tugas(Request $request, $id)
    {
        $datatugas = Tugas::create([
            'nama_tugas' => $request->nama_tugas,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'tenggat' => $request->tenggat,
            'file_tugas' => $request->file_tugas,
            'bab_id' => $id,
        ]);
        if ($request->hasfile('file_tugas')) {
            $request->file('file_tugas')->move('Tugas/', $request->file('file_tugas')->getClientOriginalName());
            $datatugas->file_tugas = $request->file('file_tugas')->getClientOriginalName();
            $datatugas->save();
        }
        return redirect('tugas_guru/' . $id)->with('succes', 'Data Berhasil Di Tambahkan !');
    }
    public function delete_tugas($id, $idbab)
    {
        $data = Bab::where('id', $id)->first();
        $datatugas = Tugas::with('bab')->where('bab_id', "=", $id);
        $datatugas = Tugas::find($id);
        $datatugas->delete();
        return redirect('tugas_guru/' . $idbab)->with('succes', 'Data Berhasil Di Hapus !');
    }
    public function update_tugas(Request $request, $id)
    {
        $datatugas = Tugas::find($id);
        $datatugas->update([
            'nama_tugas' => $request->nama_tugas,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'tenggat' => $request->tenggat,
            'bab_id' => $request->bab_id,
        ]);
        if ($request->hasfile('file_tugas')) {
            $request->file('file_tugas')->move('Tugas/', $request->file('file_tugas')->getClientOriginalName());
            $datatugas->file_tugas = $request->file('file_tugas')->getClientOriginalName();
            $datatugas->save();
        }
        return redirect('tugas_guru/' . $request->bab_id)->with('succes', 'Data Berhasil Di Update !');
    }
    public function tambah_mapel()
    {
        return view('guru.tambah_mapel');
    }
    public function insert_mapel(Request $request)
    {
        $datamapel = Mapel::create([
            'nama_mapel' => $request->nama_mapel,
            'deskripsi_mapel' => $request->deskripsi_mapel,
            'foto_mapel' => $request->foto_mapel,

        ]);
        if ($request->hasfile('foto_mapel')) {
            $request->file('foto_mapel')->move('Mapel/', $request->file('foto_mapel')->getClientOriginalName());
            $datamapel->foto_mapel = $request->file('foto_mapel')->getClientOriginalName();
            $datamapel->save();
        }
        return redirect('daftar_mapel_guru')->with('succes', 'data Berhasil Di Tambahkan !');
    }
    public function daftar_mapel_tugas()
    {
        $datamapel = Mapel::all();
        $datamapel = Mapel::paginate(6);
        return view('guru.daftar_mapel_tugas', compact('datamapel'));
    }
    public function delete_mapel($id)
    {
        $datamapel = Mapel::find($id);
        $data = Bab::with('mapel')->where('mapel_id', '=', $id);
        $datatugas = Tugas::with('bab')->where('bab_id', '=', $id);
        $datamapel->delete();
        $data->delete();
        $datatugas->delete();
        return redirect('daftar_mapel_guru')->with('succes', 'Data Berhasil Di Hapus !');
    }
    public function update_mapel(Request $request, $id)
    {
        $datamapel = Mapel::find($id);
        $datamapel->update([
            'nama_mapel' => $request->nama_mapel,
            'deskripsi_mapel' => $request->deskripsi_mapel,


        ]);
        if ($request->hasfile('foto_mapel')) {
            $request->file('foto_mapel')->move('Mapel/', $request->file('foto_mapel')->getClientOriginalName());
            $datamapel->foto_mapel = $request->file('foto_mapel')->getClientOriginalName();
            $datamapel->save();
        }
        return redirect('daftar_mapel_guru')->with('succes', 'Data Berhasil Di Update !');
    }
}
