<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalAdmins = User::where('role', 'ADMIN')->count();
        $totalPendaftar = User::where('role', 'PENDAFTAR')->count();
        $pendaftar = User::where('role', 'PENDAFTAR')->get();

        return view('admin.dashboard', compact('totalAdmins', 'totalPendaftar', 'pendaftar'));
    }

    public function selectUser($id)
    {
        $user = User::findOrFail($id);
        
        // Update the user status or do whatever selection logic you need
        // For example, if you have a 'status' column:
        // $user->status = 'approved';
        // $user->save();
        
        // Or redirect to a selection/approval page
        return redirect()->route('admin.dashboard')->with('success', 'User selected successfully!');
    }
}