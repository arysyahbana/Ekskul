<?php

namespace App\Http\Controllers\Pelatih;

use App\Exports\siswaEkskulExport;
use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\HasilSmart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

    private function getLatestSiswaByEkskul($ekskulKode, $additionalQuery = null)
    {
        $query = HasilSmart::with('rSiswa')
            ->where('id_ekskul', $ekskulKode)
            ->whereIn('id', function ($subquery) {
                $subquery->select(DB::raw('MAX(id)'))
                    ->from('hasil_smarts')
                    ->groupBy('id_siswa');
            });

        if ($additionalQuery) {
            $query = $query->whereHas('rSiswa', $additionalQuery);
        }

        return $query->get()->map(function ($siswa1) {
            return [
                'nis' => $siswa1->rSiswa->nis ?? '',
                'nama' => $siswa1->rSiswa->nama ?? '',
                'gender' => $siswa1->rSiswa->gender ?? '',
                'kelas' => $siswa1->rSiswa->kelas ?? '',
                'jenjang' => $siswa1->rSiswa->jenjang ?? '',
            ];
        });
    }

    private function generateExcel($siswaData, $filenamePrefix)
    {
        $today = date('d-m-Y');
        $filename = $filenamePrefix . ' ' . $today . '.xlsx';

        return Excel::download(new siswaEkskulExport($siswaData), $filename);
    }

    public function index()
    {
        $page = 'Data Siswa';
        $ekskul = Ekstrakurikuler::with('rPelatih')
            ->where('id_pelatih', $this->idUser->id)
            ->first();

        $siswa = $this->getLatestSiswaByEkskul($ekskul->kode_ekskul);
        return view('Pelatih.dataSiswa.index', compact('page', 'siswa'));
    }

    public function downloadPelatih()
    {
        $ekskul = Ekstrakurikuler::with('rPelatih')
            ->where('id_pelatih', $this->idUser->id)
            ->first();

        if (!$ekskul) {
            return redirect()->back()->with('error', 'Ekstrakurikuler not found for this user.');
        }

        $siswa = [
            $ekskul->nama_ekskul => $this->getLatestSiswaByEkskul($ekskul->kode_ekskul)
        ];

        return $this->generateExcel($siswa, 'Siswa Ekskul Pelatih');
    }

    public function kepsek()
    {
        $page = 'Data Siswa';
        $ekskul = Ekstrakurikuler::with('rPelatih')->get();
        $siswa = [];

        foreach ($ekskul as $item) {
            $siswa[$item->kode_ekskul] = $this->getLatestSiswaByEkskul($item->kode_ekskul);
        }

        return view('kepsek.dataSiswa.index', compact('page', 'ekskul', 'siswa'));
    }

    public function downloadKepsek()
    {
        $ekskul = Ekstrakurikuler::with('rPelatih')->get();
        $siswa = [];

        foreach ($ekskul as $item) {
            $siswa[$item->nama_ekskul] = $this->getLatestSiswaByEkskul($item->kode_ekskul);
        }

        return $this->generateExcel($siswa, 'Siswa Ekskul Kepsek');
    }

    public function waliKelas()
    {
        $page = 'Data Siswa';
        $ekskul = Ekstrakurikuler::with('rPelatih')->get();
        $wali = $this->idUser;
        $siswa = [];

        foreach ($ekskul as $item) {
            $siswa[$item->kode_ekskul] = $this->getLatestSiswaByEkskul($item->kode_ekskul, function ($query) use ($wali) {
                $query->where('jenjang', $wali->jenjang)
                    ->where('kelas', $wali->kelas)
                    ->where('jurusan', $wali->jurusan);
            });
        }
        return view('waliKelas.dataSiswa.index', compact('page', 'ekskul', 'siswa'));
    }

    public function downloadWali()
    {
        $ekskul = Ekstrakurikuler::all();
        $wali = $this->idUser;
        $siswa = [];

        foreach ($ekskul as $item) {
            $siswa[$item->nama_ekskul] = $this->getLatestSiswaByEkskul($item->kode_ekskul, function ($query) use ($wali) {
                $query->where('jenjang', $wali->jenjang)
                    ->where('kelas', $wali->kelas)
                    ->where('jurusan', $wali->jurusan);
            });
        }

        return $this->generateExcel($siswa, 'Siswa Ekskul Wali Kelas');
    }
}
