<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bab extends Model
{
    protected $table = 'bab';
    protected $fillable = ['judul', 'deskripsi', 'bab_file', 'mapel_id'];
    public function tugass()
    {
        return $this->hasMany(Tugas::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
