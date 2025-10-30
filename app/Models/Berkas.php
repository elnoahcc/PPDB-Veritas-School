<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ijazah_skhun',
        'akta_kelahiran',
        'kk',
        'pas_foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
