<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = [
        'username',
        'password',
        'role',
        'no_hp',
        'nisn_pendaftar',
        'nama_pendaftar',
        'tanggallahir_pendaftar',
        'alamat_pendaftar',
        'agama',
        'prestasi',
        'nama_ortu',
        'pekerjaan_ortu',
        'no_hp_ortu',
        'alamat_ortu',
        'nilai_smt1',
        'nilai_smt2',
        'nilai_smt3',
        'nilai_smt4',
        'nilai_smt5',
    ];  

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function prestasis()
{
    return $this->hasMany(Prestasi::class);
}

}
