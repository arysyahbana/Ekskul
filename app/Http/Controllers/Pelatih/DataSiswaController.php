<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $page = "Data Siswa";
        return view('Pelatih.dataSiswa.index', compact('page'));
    }

    public function kepsek()
    {
        $page = "Data Siswa";
        return view('kepsek.dataSiswa.index', compact('page'));
    }
}
