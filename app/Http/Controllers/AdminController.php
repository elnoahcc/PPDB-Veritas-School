<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAdmins = User::where('role', 'ADMIN')->count();
        $totalPendaftar = User::where('role', 'PENDAFTAR')->count();

        $pendaftar = User::where('role', 'PENDAFTAR')
            ->with(['berkas', 'prestasis'])
            ->get();

        return view('admin.dashboard', compact('totalAdmins', 'totalPendaftar', 'pendaftar'));
    }

    public function approvePendaftar($id)
    {
        $pendaftar = User::findOrFail($id);

        if ($pendaftar->role !== 'PENDAFTAR') {
            return redirect()->back()->with('error', 'Invalid user role');
        }

        $pendaftar->status = 'approved';
        $pendaftar->save();

        return redirect()->back()->with('success', 'Pendaftar berhasil diterima');
    }

    public function rejectPendaftar($id)
    {
        $pendaftar = User::findOrFail($id);

        if ($pendaftar->role !== 'PENDAFTAR') {
            return redirect()->back()->with('error', 'Invalid user role');
        }

        $pendaftar->status = 'rejected';
        $pendaftar->save();

        return redirect()->back()->with('success', 'Pendaftar berhasil ditolak');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }

    // Edit
public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.edit_pendaftar', compact('user')); // buat file view edit_pendaftar.blade.php
}

// Update
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update($request->only([
        'nama_pendaftar',
        'nisn_pendaftar',
        'tanggallahir_pendaftar',
        'alamat_pendaftar',
        'agama',
        'nama_ortu',
        'pekerjaan_ortu',
        'no_hp_ortu',
    ]));

    return redirect()->route('admin.dashboard')->with('success', 'Data pendaftar berhasil diperbarui.');
}

// Delete
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Data pendaftar berhasil dihapus.');
}
}
