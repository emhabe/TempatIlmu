<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama'];

    public function userguru()
    {
        return $this->hasOne(userguru::class);
    }
    public function usersiswa()
    {
        return $this->hasOne(usersiswa::class);
    }
    public function usergurus_jurusan()
    {
        return $this->hasOne(usergurus_jurusan::class);
    }
    public function userguru_kelas()
    {
        return $this->hasOne(usergurus_kelas::class);
    }
}
