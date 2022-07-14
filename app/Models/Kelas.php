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
}
