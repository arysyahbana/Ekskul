<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    private function validasiInputData(Request $request, $passwordRule)
    {
        $request->validate(
            [
                'nis' => 'sometimes',
                'nama' => 'required|alpha',
                'gender' => 'required',
                // 'kelas' => 'sometimes|integer|between:1,12',
                'jenjang' => 'sometimes',
                'jurusan' => 'sometimes',
                'tgl_lahir' => 'required|date',
                'email' => 'required|email',
                'role' => 'required',
                'password' => $passwordRule,
            ],
            [
                'nama.alpha' => 'Nama tidak boleh mengandung angka atau simbol',
                'nama.required' => 'Nama wajib diisi',
                'gender.required' => 'Gender wajib dipilih',
                // 'kelas.integer' => 'Kelas harus berupa angka',
                // 'kelas.between' => 'Kelas harus antara 1-12',
                'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
                'tgl_lahir.date' => 'Tanggal lahir harus berupa tanggal',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email harus berupa email',
                'role.required' => 'Role harus dipilih',
                'password.required' => 'Password wajib diisi',
            ],
        );
    }

    public function index()
    {
        $page = 'Users';
        $users = User::get();
        $ekskuls = Ekstrakurikuler::get();
        return view('admin.pages.User.index', compact('page', 'users', 'ekskuls'));
    }

    public function store(Request $request)
    {
        $this->validasiInputData($request, 'required');

        user::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'kelas' => $request->kelas,
            'jenjang' => $request->jenjang,
            'jurusan' => $request->jurusan,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.show')->with('success', 'Data user berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $this->validasiInputData($request, 'sometimes');

        $update = User::find($id);
        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'kelas' => $request->kelas,
            'jenjang' => $request->jenjang,
            'jurusan' => $request->jurusan,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'role' => $request->role,
        ];
        // dd($data);
        if ($request->password == null) {
            User::updateOrCreate(['id' => $update->id], $data);
        } else {
            $data['password'] = Hash::make($request->password);
            User::updateOrCreate(['id' => $update->id], $data);
        }
        return redirect()->route('users.show')->with('success', 'Data user berhasil diubah.');
    }

    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        return redirect()->route('users.show')->with('success', 'Data user berhasil dihapus.');
    }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new UserExport(), 'User - ' . $today . '.xlsx');
    }
}
