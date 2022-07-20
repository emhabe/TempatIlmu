<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas_siswa extends Model
{
    protected $table = 'tugas_siswa';
    protected $fillable = ['upload_tugas'];
}
