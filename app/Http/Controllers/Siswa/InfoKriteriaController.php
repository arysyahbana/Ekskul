<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoKriteriaController extends Controller
{
    public function index()
    {
        $page = "Informasi Kriteria";
        return view('siswa.pages.InfoKriteria.index', compact('page'));
    }
}
