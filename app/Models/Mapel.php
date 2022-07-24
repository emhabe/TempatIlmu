<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = ('mapel');
    protected $fillable = ['nama_mapel', 'deskripsi_mapel', 'foto_mapel', 'usergurus_jurusan_id', 'usergurus_kelas_id'];

    public function bab()
    {
        return $this->hasMany(Bab::class);
    }
    public function usergurus_jurusan()
    {
        return $this->belongsTo(usergurus_jurusan::class);
    }
    public function usergurus_kelas()
    {
        return $this->belongsTo(usergurus_kelas::class);
    }
}
