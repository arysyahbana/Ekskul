<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class InfoEkskulController extends Controller
{
    public function index()
    {
        $page = "Informasi Ekskul";
        $ekskul = Ekstrakurikuler::get();
        return view('siswa.pages.InfoEkskul.index', compact('page', 'ekskul'));
    }
}
