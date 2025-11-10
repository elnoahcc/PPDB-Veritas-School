<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'ijazah_skhun' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_kelahiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $userId = Auth::id();

        $berkas = Berkas::updateOrCreate(
            ['user_id' => $userId],
            [
                'ijazah_skhun' => $request->file('ijazah_skhun') ? $request->file('ijazah_skhun')->store('berkas') : null,
                'akta_kelahiran' => $request->file('akta_kelahiran') ? $request->file('akta_kelahiran')->store('berkas') : null,
                'kk' => $request->file('kk') ? $request->file('kk')->store('berkas') : null,
                'pas_foto' => $request->file('pas_foto') ? $request->file('pas_foto')->store('berkas') : null,
            ]
        );

        return back()->with('success', 'Berkas berhasil di-upload!');
    }
}
