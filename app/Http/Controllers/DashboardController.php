<?php

namespace App\Http\Controllers;

use App\Models\DetailBantuan;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sinforman | Dashboard',
            'menu' => 'dashboard',
            'penduduks' => Penduduk::all()->count(),
            'keluargas' => Keluarga::all()->count(),
            'bantuans' => DetailBantuan::all()->count(),
        ];
        // dd($data);

        return view('dashboard.dashboard.dashboard', $data);
    }
}
