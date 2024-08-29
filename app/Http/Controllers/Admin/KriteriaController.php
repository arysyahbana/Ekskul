<?php

namespace App\Http\Controllers\Admin;

use App\Exports\kriteriaExport;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KriteriaController extends Controller
{
    private function validasiInputData(Request $request)
    {
        $request->validate(
            [
                'kode' => 'required',
                'nama' => 'required',
                'bobot' => 'required|numeric|between:1,5',
                'jenis' => 'required',
            ],
            [
                'kode.required' => 'Kode kriteria wajib diisi',
                'nama.required' => 'Nama kriteria wajib diisi',
                'bobot.required' => 'Bobot kriteria wajib diisi',
                'bobot.numeric' => 'Bobot kriteria harus berupa angka',
                'bobot.between' => 'Bobot kriteria harus berupa angka antara 1 sampai 5',
                'jenis.required' => 'Jenis kriteria wajib diisi',
            ],
        );
    }

    public function index()
    {
        $page = 'Kriteria';
        $kriteria = Kriteria::get();
        return view('admin.pages.Kriteria.index', compact('page', 'kriteria'));
    }

    public function store(Request $request)
    {
        $this->validasiInputData($request);
        Kriteria::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);

        return back()->with('success', 'Data kriteria berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validasiInputData($request);
        $kriteria = Kriteria::find($id);
        $kriteria->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis,
        ]);
        return back()->with('success', 'Data kriteria berhasil diubah');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return back()->with('success', 'Data kriteria berhasil dihapus');
    }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new kriteriaExport(), 'Kriteria - ' . $today . '.xlsx');
    }
}
