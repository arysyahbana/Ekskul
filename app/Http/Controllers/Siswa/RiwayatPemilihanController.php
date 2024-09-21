<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\HasilBobotTotal;
use App\Models\HasilNormalisasiDanUtilities;
use App\Models\HasilSmart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPemilihanController extends Controller
{
    public function index()
    {
        $page = 'Riwayat Pemilihan';
        $rekomendasi = HasilSmart::with('rEkstrakurikuler')->where('id_siswa', Auth::id())->get();
        // return $rekomendasi;

        return view('siswa.pages.Riwayat Pemilihan.index', compact('page', 'rekomendasi'));
    }

    public function detail($idBobotTotal)
    {
        $page = "Riwayat Pemilihan";
        $hasilSmart = HasilNormalisasiDanUtilities::with('rEkstrakurikuler','rSiswa')->where('id_hasil_bobot_total', $idBobotTotal)->orderBy('hasil_utilities','DESC')->get();
        // dd($idBobotTotal);die;
        return view('siswa.pages.Riwayat Pemilihan.detail', compact('page','hasilSmart'));
    }
}
