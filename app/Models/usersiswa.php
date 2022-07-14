<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class usersiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'usersiswas';
    protected $fillable = [
        'nisn',
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
        return $this->belongsTo(kelas::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(sekolah::class, 'id_sekolah', 'id');
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
