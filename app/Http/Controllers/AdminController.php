<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Cek password lama
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama salah.']);
    }

    // Update LANGSUNG ke database tanpa model
    \DB::table('users')
        ->where('id', $user->id)
        ->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now()
        ]);

    return back()->with('success', 'Password berhasil diubah.');
}
use App\Models\User;

public function seleksiOtomatis()
{
    $users = User::where('role', 'user')->get(); // pastikan cuma user, bukan admin

    foreach ($users as $user) {
        if (!empty($user->prestasi) && $user->nilai_smt5 >= 80) {
            $user->status_seleksi = 'Lulus Sementara';
        } else {
            $user->status_seleksi = 'Tidak Lulus Sementara';
        }
        $user->save();
    }

    return redirect()->back()->with('success', 'Seleksi otomatis berhasil dijalankan!');
}

public function updateSeleksi(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->status_seleksi = $request->status_seleksi;
    $user->save();

    return redirect()->back()->with('success', 'Status seleksi berhasil diperbarui.');
}



}

