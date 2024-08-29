<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ekskulExport;
use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EkskulController extends Controller
{
    private function validasiInputData(Request $request, $imageRule)
    {
        $request->validate(
            [
                'kode' => 'required',
                'nama' => 'required',
                'image' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'info' => 'required',
            ],
            [
                'kode.required' => 'Kode ekskul wajib diisi',
                'nama.required' => 'Nama ekskul wajib diisi',
                'image.required' => 'Gambar ekskul wajib diisi',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg',
                'image.max' => 'Gambar tidak boleh lebih dari 2 MB',
            ],
        );
    }

    private function getImage($image, $name)
    {
        if ($image == null) {
            return null;
        }
        $extension = $image->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $path = public_path('dist/assets/img/ekskul');
        $image->move($path, $filename);
        return $filename;
    }

    public function index()
    {
        $page = 'Ekskul';
        $ekskul = Ekstrakurikuler::get();
        // return $ekskul;
        return view('admin.pages.Ekskul.index', compact('page', 'ekskul'));
    }

    public function store(Request $request)
    {
        $this->validasiInputData($request, 'required');
        $image = $this->getImage($request->file('image'), $request->nama);
        Ekstrakurikuler::create([
            'kode_ekskul' => $request->kode,
            'nama_ekskul' => $request->nama,
            'image' => $image,
            'informasi_ekskul' => trim($request->info),
        ]);

        return back()->with('success', 'Data ekskul berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validasiInputData($request, 'sometimes');
        $ekskul = Ekstrakurikuler::find($id);
        $data = [
            'kode_ekskul' => $request->kode,
            'nama_ekskul' => $request->nama,
            'informasi_ekskul' => trim($request->info),
        ];
        $image = $this->getImage($request->file('image'), $request->nama);
        if (!$image) {
            Ekstrakurikuler::updateOrCreate(['id' => $ekskul->id], $data);
        } else {
            if ($request->nama != $ekskul->nama_ekskul) {
                unlink(public_path('dist/assets/img/ekskul/' . $ekskul->image));
            }
            $data['image'] = $image;
            Ekstrakurikuler::updateOrCreate(['id' => $ekskul->id], $data);
        }

        return back()->with('success', 'Data ekskul berhasil diubah');
    }

    public function destroy($id)
    {
        $ekskul = Ekstrakurikuler::find($id);
        unlink(public_path('dist/assets/img/ekskul/' . $ekskul->image));
        $ekskul->delete();
        return back()->with('success', 'Data ekskul berhasil dihapus');
    }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new ekskulExport(), 'ekskul - ' . $today . '.xlsx');
    }
}
