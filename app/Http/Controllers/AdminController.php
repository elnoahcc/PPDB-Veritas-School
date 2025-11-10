<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function dashboard()
    {
        $totalAdmins = User::where('role', 'ADMIN')->count();
        $totalPendaftar = User::where('role', 'PENDAFTAR')->count();

        $admins = User::where('role', 'ADMIN')->get();
        $pendaftar = User::where('role', 'PENDAFTAR')
            ->with(['berkas', 'prestasis'])
            ->get();

        return view('admin.dashboard', compact('totalAdmins', 'totalPendaftar', 'admins', 'pendaftar'));
    }

    /**
     * Approve Pendaftar
     */
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

    /**
     * Reject Pendaftar
     */
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

    /**
     * Update Profil Admin
     */
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

    /**
     * Update Password Admin
     */
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

    /**
     * Edit Pendaftar
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_pendaftar', compact('user'));
    }

    /**
     * Update Pendaftar
     */
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

    /**
     * Delete Pendaftar
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data pendaftar berhasil dihapus.');
    }

    /**
     * Tampilkan Form Tambah Admin
     */
    public function create()
    {
        return view('admin.create_admin');
    }

    /**
     * Simpan Admin Baru
     */
    public function store(Request $request)
{
    $request->validate([
        'username' => 'required|string|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'nama_panitia' => 'required|string|max:50', // input tambahan untuk admin
    ]);

    // Buat user dulu
    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'ADMIN',
    ]);

    // Buat record di tabel admin
    Admin::create([
        'user_id' => $user->id,
        'nama_panitia' => $request->nama_panitia,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Admin baru berhasil ditambahkan');
}

    /**
     * Edit Admin
     */
    public function editAdmin($id)
    {
        $admin = User::where('role', 'ADMIN')->findOrFail($id);
        return view('admin.edit_admin', compact('admin'));
    }

    /**
     * Update Admin
     */
 public function updateAdmin(Request $request, $id)
{
    $request->validate([
        'username' => 'required|string|max:100',
        'no_hp' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:150',
    ]);

    // Ambil user berdasarkan ID (karena username & email ada di tabel users)
    $user = \App\Models\User::findOrFail($id);

    // Update kolom di tabel users
    $user->username = $request->username;
    $user->email = $request->email;
    $user->save();

    // Update kolom tambahan di tabel admin (misalnya no_hp)
    $admin = \App\Models\Admin::where('user_id', $id)->first();
    if ($admin) {
        $admin->no_hp = $request->no_hp;
        $admin->save();
    }

    return redirect()->back()->with('success', 'Data admin berhasil diperbarui!');
}



    /**
     * Delete Admin
     */
    public function destroyAdmin($id)
    {
        $admin = User::where('role', 'ADMIN')->findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil dihapus');
    }
}
