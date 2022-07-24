<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usergurus_jurusan extends Model
{
    use HasFactory;
    protected $table = 'usergurus_jurusan';
    protected $fillable = ['jurusan_id', 'usergurus_id', 'kelas_id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function userguru()
    {
        return $this->belongsTo(userguru::class);
    }
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
