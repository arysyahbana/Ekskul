<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilihanEkskulController extends Controller
{
    public function index()
    {
        $page = "Pemilihan Ekskul";
        $siswa = Auth::user();
        $ekskul = Ekstrakurikuler::get();
        return view('siswa.pages.PemilihanEkskul.index', compact('page', 'siswa','ekskul'));
    }
    public function hasil()
    {
        $page = "Pemilihan Ekskul";
        return view('siswa.pages.PemilihanEkskul.hasil', compact('page'));
    }
}
