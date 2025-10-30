<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_prestasi',
        'tingkat',
        'tahun',          // tambahkan ini
        'foto_prestasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
