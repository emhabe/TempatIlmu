<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = ['nama_tugas', 'slug', 'deskripsi_tugas', 'tenggat', 'file_tugas', 'bab_id'];

    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }
}
