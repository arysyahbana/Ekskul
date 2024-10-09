<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $page = "Data Siswa";
        $siswa = User::where('role', 'Siswa')->get();
        return view('Pelatih.dataSiswa.index', compact('page', 'siswa'));
    }

    public function kepsek()
    {
        $page = "Data Siswa";
        $ekskul = Ekstrakurikuler::all();
        return view('kepsek.dataSiswa.index', compact('page', 'ekskul'));
    }

    public function waliKelas()
    {
        $page = "Data Siswa";
        return view('waliKelas.dataSiswa.index', compact('page'));
    }
}
