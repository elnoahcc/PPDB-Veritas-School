<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // pastikan ini nama tabelnya

    protected $primaryKey = 'id_panitia'; // sesuai struktur tabel kamu

    protected $fillable = [
        'user_id',
        'nama_panitia',
    ];

    public $timestamps = false; // kalau tabel admin tidak pakai created_at/updated_at
}
