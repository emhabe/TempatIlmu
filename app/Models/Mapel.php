<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = ('mapel');
    protected $fillable = ['nama_mapel', 'deskripsi_mapel', 'foto_mapel'];

    public function bab()
    {
        return $this->hasMany(Bab::class);
    }
}
