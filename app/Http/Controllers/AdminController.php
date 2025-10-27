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
    $totalAdmins = User::where('role', 'ADMIN')->count();  // ADMIN uppercase
    $totalPendaftar = User::where('role', 'PENDAFTAR')->count();  // PENDAFTAR uppercase
    $pendaftar = User::where('role', 'PENDAFTAR')  // PENDAFTAR uppercase
                    ->with('berkas')
                    ->get();

    return view('admin.dashboard', compact('totalAdmins', 'totalPendaftar', 'pendaftar'));
}

public function approvePendaftar($id)
{
    $pendaftar = User::findOrFail($id);
    
    if ($pendaftar->role !== 'PENDAFTAR') {  // PENDAFTAR uppercase
        return redirect()->back()->with('error', 'Invalid user role');
    }
    
    $pendaftar->status = 'approved';
    $pendaftar->save();
    
    return redirect()->back()->with('success', 'Pendaftar berhasil diterima');
}

public function rejectPendaftar($id)
{
    $pendaftar = User::findOrFail($id);
    
    if ($pendaftar->role !== 'PENDAFTAR') {  // PENDAFTAR uppercase
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

    
}