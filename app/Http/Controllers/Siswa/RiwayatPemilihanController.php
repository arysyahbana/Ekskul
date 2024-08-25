<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatPemilihanController extends Controller
{
    public function index()
    {
        $page = "Riwayat Pemilihan";
        return view('siswa.pages.Riwayat Pemilihan.index', compact('page'));
    }
}
