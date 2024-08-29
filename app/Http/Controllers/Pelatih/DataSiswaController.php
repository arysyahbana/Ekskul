<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
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
        return view('kepsek.dataSiswa.index', compact('page'));
    }
}
