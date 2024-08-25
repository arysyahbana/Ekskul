<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $page = "Siswa";
        return view('admin.pages.Siswa.index', compact('page'));
    }
}
