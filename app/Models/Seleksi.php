<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nilai_total',
        'status',
        'catatan',
        'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function updater()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
}
