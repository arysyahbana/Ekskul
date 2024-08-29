<?php

namespace App\Http\Controllers\Admin;

use App\Exports\siswaExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    // private function validasiInputData(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'nis' => 'required',
    //             'nama' => 'required',
    //             'gender' => 'required|numeric|between:1,5',
    //             'kelas' => 'required',
    //             'jenjang' => 'required',
    //         ],
    //         [
    //             'kode.required' => 'Kode kriteria wajib diisi',
    //             'nama.required' => 'Nama kriteria wajib diisi',
    //             'bobot.required' => 'Bobot kriteria wajib diisi',
    //             'jenis.required' => 'Jenis kriteria wajib diisi',
    //         ],
    //     );
    // }
    public function index()
    {
        $page = 'Siswa';
        $siswa = User::where('role', 'Siswa')->get();
        return view('admin.pages.Siswa.index', compact('page', 'siswa'));
    }

    // public function store(Request $request){

    // }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new siswaExport(), 'Siswa - ' . $today . '.xlsx');
    }
}
