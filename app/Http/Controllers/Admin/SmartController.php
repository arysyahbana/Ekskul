<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmartController extends Controller
{
    public function index()
    {
        $page = "SMART";
        return view('admin.pages.Smart.index', compact('page'));
    }
    public function detail()
    {
        $page = "SMART";
        return view('admin.pages.Smart.hasil', compact('page'));
    }
}
