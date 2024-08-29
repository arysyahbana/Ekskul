<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class InfoKriteriaController extends Controller
{
    public function index()
    {
        $page = "Informasi Kriteria";
        $kriteria = Kriteria::get();
        return view('siswa.pages.InfoKriteria.index', compact('page', 'kriteria'));
    }
}
