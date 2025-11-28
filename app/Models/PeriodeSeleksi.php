<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PeriodeSeleksi extends Model
{
    use HasFactory;

    protected $table = 'periode_seleksi';

    protected $fillable = [
        'nama_periode',
        'kuota',
        'tanggal_mulai',
        'tanggal_selesai',
        'batas_lulus',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'batas_lulus' => 'decimal:2',
        'kuota' => 'integer'
    ];

    /**
     * Relasi ke User (Pendaftar)
     */
    public function users()
    {
        return $this->hasMany(User::class, 'periode_id');
    }

    /**
     * Relasi ke Seleksi
     */
    public function seleksis()
    {
        return $this->hasMany(Seleksi::class, 'periode_id');
    }

    /**
     * ✅ Method untuk cek apakah periode aktif
     */
    public function isAktif(): bool
    {
        return $this->status === 'aktif' && 
               Carbon::now()->between($this->tanggal_mulai, $this->tanggal_selesai);
    }

    /**
     * ✅ Scope untuk mendapatkan periode aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif')
                    ->where('tanggal_mulai', '<=', Carbon::now())
                    ->where('tanggal_selesai', '>=', Carbon::now());
    }

    /**
     * ✅ Method untuk menghitung jumlah peserta
     */
    public function jumlahPeserta(): int
    {
        return $this->users()->where('role', 'PENDAFTAR')->count();
    }

    /**
     * ✅ Method untuk menghitung jumlah peserta lulus
     */
    public function jumlahLulus(): int
    {
        return $this->users()
                    ->where('role', 'PENDAFTAR')
                    ->where('status_seleksi', 'Lulus')
                    ->count();
    }

    /**
     * ✅ Method untuk menghitung jumlah peserta tidak lulus
     */
    public function jumlahTidakLulus(): int
    {
        return $this->users()
                    ->where('role', 'PENDAFTAR')
                    ->where('status_seleksi', 'Tidak Lulus')
                    ->count();
    }

    /**
     * ✅ Method untuk menghitung jumlah peserta belum diseleksi
     */
    public function jumlahBelumDiseleksi(): int
    {
        return $this->users()
                    ->where('role', 'PENDAFTAR')
                    ->where('status_seleksi', 'Belum Diseleksi')
                    ->count();
    }

    /**
     * ✅ Method untuk cek apakah kuota sudah penuh
     */
    public function isKuotaPenuh(): bool
    {
        return $this->jumlahLulus() >= $this->kuota;
    }

    /**
     * ✅ Method untuk mendapatkan sisa kuota
     */
    public function sisaKuota(): int
    {
        return max(0, $this->kuota - $this->jumlahLulus());
    }

    /**
     * ✅ Method untuk cek apakah periode sudah lewat
     */
    public function isSudahLewat(): bool
    {
        return Carbon::now()->gt($this->tanggal_selesai);
    }

    /**
     * ✅ Method untuk cek apakah periode belum dimulai
     */
    public function isBelumDimulai(): bool
    {
        return Carbon::now()->lt($this->tanggal_mulai);
    }

    /**
     * ✅ Method untuk mendapatkan status label dengan warna
     */
    public function getStatusBadge(): string
    {
        return match($this->status) {
            'aktif' => '<span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Aktif</span>',
            'selesai' => '<span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">Selesai</span>',
            'draft' => '<span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Draft</span>',
            default => '<span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">' . ucfirst($this->status) . '</span>',
        };
    }

    /**
     * ✅ Method untuk mendapatkan durasi periode dalam hari
     */
    public function getDurasiHari(): int
    {
        return $this->tanggal_mulai->diffInDays($this->tanggal_selesai);
    }

    /**
     * ✅ Method untuk mendapatkan sisa hari periode
     */
    public function getSisaHari(): int
    {
        if ($this->isSudahLewat()) {
            return 0;
        }
        
        if ($this->isBelumDimulai()) {
            return $this->tanggal_mulai->diffInDays(Carbon::now());
        }
        
        return Carbon::now()->diffInDays($this->tanggal_selesai);
    }
}