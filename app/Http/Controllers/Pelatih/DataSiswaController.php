<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\HasilSmart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataSiswaController extends Controller
{
    protected $idUser;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->idUser = Auth::user();
            return $next($request);
        });
    }
    public function index()
    {
        // dd($this->idUser);
        $page = 'Data Siswa';
        $ekskul = Ekstrakurikuler::with('rPelatih')->where('id_pelatih', $this->idUser->id)->first();
        // dd($ekskul);
        $siswa = HasilSmart::with('rSiswa')
            ->where('id_ekskul', $ekskul->kode_ekskul)
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))->from('hasil_smarts')->groupBy('id_siswa');
            })
            ->get();
        return view('Pelatih.dataSiswa.index', compact('page', 'siswa'));
    }

    public function kepsek()
    {
        $page = 'Data Siswa';
        $ekskul = Ekstrakurikuler::with('rPelatih')->get();
        // dd($ekskul);
        $siswa = []; // Initialize the siswa array

        foreach ($ekskul as $item) {
            $allSiswa = HasilSmart::with('rSiswa')
                ->where('id_ekskul', $item->kode_ekskul)
                ->whereIn('id', function ($query) {
                    $query->select(DB::raw('MAX(id)'))->from('hasil_smarts')->groupBy('id_siswa');
                })
                ->get()
                ->map(function ($siswa1) {
                    return [
                        'nis' => $siswa1->rSiswa->nis ?? '',
                        'nama' => $siswa1->rSiswa->nama ?? '',
                        'gender' => $siswa1->rSiswa->gender ?? '',
                        'kelas' => $siswa1->rSiswa->kelas ?? '',
                        'jenjang' => $siswa1->rSiswa->jenjang ?? '',
                    ];
                });

            $siswa[$item->kode_ekskul] = $allSiswa;
        }

        return view('kepsek.dataSiswa.index', compact('page', 'ekskul', 'siswa'));
    }

    public function waliKelas()
    {
        $page = 'Data Siswa';
        $ekskul = Ekstrakurikuler::all();
        $wali = $this->idUser; // Assuming this is the logged-in user

        // Initialize an empty array to store students per ekskul
        $siswa = [];

        foreach ($ekskul as $item) {
            // Fetch the relevant siswa for each ekskul
            $allSiswa = HasilSmart::with('rSiswa') // Assuming rSiswa is the relationship
                ->where('id_ekskul', $item->kode_ekskul)
                ->whereHas('rSiswa', function ($query) use ($wali) {
                    $query
                        ->where('jenjang', $wali->jenjang)
                        ->where('kelas', $wali->kelas)
                        ->where('jurusan', $wali->jurusan);
                })
                ->whereIn('id', function ($query) {
                    // Subquery to select the latest result for each student
                    $query->select(DB::raw('MAX(id)'))->from('hasil_smarts')->groupBy('id_siswa');
                })
                ->get()
                ->map(function ($siswa1) {
                    // Map the student data
                    return [
                        'nis' => $siswa1->rSiswa->nis ?? '',
                        'nama' => $siswa1->rSiswa->nama ?? '',
                        'gender' => $siswa1->rSiswa->gender ?? '',
                        'kelas' => $siswa1->rSiswa->kelas ?? '',
                        'jenjang' => $siswa1->rSiswa->jenjang ?? '',
                    ];
                });

            // Assign the result to the $siswa array under the ekskul code
            $siswa[$item->kode_ekskul] = $allSiswa;
        }

        // Debugging to check the structure of $siswa
        // dd($siswa);

        // Return the view with the data
        return view('waliKelas.dataSiswa.index', compact('page', 'ekskul', 'siswa'));
    }
}
