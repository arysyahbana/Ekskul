<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index()
    {
        $page = "Ekskul";
        return view('admin.pages.Ekskul.index', compact('page'));
    }
}
