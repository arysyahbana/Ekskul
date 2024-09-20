<?php

namespace App\Http\Controllers\Admin;

use App\Exports\smartExport;
use App\Http\Controllers\Controller;
use App\Models\HasilBobot;
use App\Models\HasilBobotTotal;
use App\Models\HasilNormalisasiDanUtilities;
use App\Models\HasilSmart;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SmartController extends Controller
{
    public function index()
    {
        $page = "SMART";
        $rekomendasi = HasilSmart::with('rEkstrakurikuler','rSiswa')->get();
        // return $rekomendasi;
        return view('admin.pages.Smart.index', compact('page','rekomendasi'));
    }
    public function detail($idBobotTotal)
    {
        $page = "SMART";

        $hasilSmart = HasilNormalisasiDanUtilities::with('rEkstrakurikuler','rSiswa')->where('id_hasil_bobot_total', $idBobotTotal)->get();
        // return $hasilSmart[0]->rSiswa->nama;
        return view('admin.pages.Smart.hasil', compact('page','hasilSmart'));
    }

    public function destroy($idBobotTotal){
        HasilSmart::where('id_hasil_bobot_total', $idBobotTotal)->delete();
        HasilNormalisasiDanUtilities::where('id_hasil_bobot_total', $idBobotTotal)->delete();
        HasilBobot::where('id_hasil_bobot_total', $idBobotTotal)->delete();
        HasilBobotTotal::where('id', $idBobotTotal)->delete();
        return redirect()->back()->with('success', 'Nilai SMART berhasil dihapus');
    }

    public function download()
    {
        $today = date('d-m-Y');
        return Excel::download(new smartExport(), 'Hasil Smart - ' . $today . '.xlsx');
    }
}
