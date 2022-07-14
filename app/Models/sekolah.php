<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $fillable = ['nama', 'alamat', 'foto'];

    /**
     * The "booting" function of model
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = mt_rand(10000, 99999);
            }
        });
    }

    public function userguru()
    {
        return $this->hasMany(userguru::class, 'id_sekolah');
    }
    public function usersiswa()
    {
        return $this->hasMany(usersiswa::class, 'id_sekolah');
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
