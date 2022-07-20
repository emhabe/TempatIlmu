<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class userguru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usergurus';
    protected $fillable = [
        'nip',
        'id_sekolah',
        'jenis_kelamin',
        'kelas_id',
        'jurusan_id',
        'name',
        'email',
        'password',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(sekolah::class, 'id_sekolah', 'id');
    }
    public function usergurus_jurusan()
    {
        return $this->hasMany(usergurus_jurusan::class, 'usergurus_id', 'id');
    }
    public function usergurus_kelas()
    {
        return $this->hasMany(usergurus_kelas::class, 'usergurus_id', 'id');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
