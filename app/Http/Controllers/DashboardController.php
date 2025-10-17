<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pendaftar = User::where('role', 'PENDAFTAR')->count();
        $total_panitia = Admin::count();

        return view('dashboard', compact('total_pendaftar', 'total_panitia'));
    }
}
