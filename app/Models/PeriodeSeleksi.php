<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeSeleksi extends Model
{
    use HasFactory;

    protected $table = 'periode_seleksi'; // UBAH INI dari 'periode_seleksis' ke 'periode_seleksi'

    protected $fillable = [
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'kuota',
        'batas_lulus',
        'status',
        'keterangan' // UBAH dari 'deskripsi' ke 'keterangan'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'kuota' => 'integer',
        'batas_lulus' => 'decimal:2'
    ];

    /**
     * Relasi ke User (pendaftar)
     */
    public function users()
    {
        return $this->hasMany(User::class, 'periode_id'); // UBAH dari 'periode_seleksi_id' ke 'periode_id'
    }

    /**
     * Hitung jumlah peserta
     */
    public function jumlahPeserta()
    {
        return $this->users()->count();
    }

    /**
     * Scope untuk periode aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}