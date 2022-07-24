<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usergurus_kelas extends Model
{
    use HasFactory;
    protected $table = 'usergurus_kelas';
    protected $fillable = ['kelas_id', 'usergurus_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
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
