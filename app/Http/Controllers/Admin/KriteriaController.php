<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $page = "Kriteria";
        return view('admin.pages.Kriteria.index', compact('page'));
    }
}
