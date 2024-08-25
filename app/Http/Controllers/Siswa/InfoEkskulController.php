<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoEkskulController extends Controller
{
    public function index()
    {
        $page = "Informasi Ekskul";
        return view('siswa.pages.InfoEkskul.index', compact('page'));
    }
}
