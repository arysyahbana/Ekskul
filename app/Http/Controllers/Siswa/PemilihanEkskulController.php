<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use App\Models\HasilBobot;
use App\Models\HasilBobotTotal;
use App\Models\HasilNormalisasiDanUtilities;
use App\Models\HasilSmart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilihanEkskulController extends Controller
{
    private function validateSmart(Request $request, $ekskul)
    {
        $rules = [
            'tinggi' => 'required',
            'berat' => 'required',
            'riwayat' => 'required',
        ];

        // Loop through each extracurricular activity and create dynamic validation rules
        // dd($ekskul);die;
        foreach ($ekskul as $e) {
            $rules['minat' . $e] = 'required';
            $rules['riwayat' . $e] = 'required';
            $rules['prestasi' . $e] = 'required';
        }

        return $request->validate($rules);
    }

    private function hitungSMART($data_siswa, $ekskul)
    {
        $utilities = [];
        // dd($ekskul);die;
        $cmin = ['tinggi' => 1, 'berat' => 1, 'riwayat' => 1, 'minat' => 1, 'riwayat_ekskul' => 1, 'prestasi' => 1];
        $cmax = ['tinggi' => 3, 'berat' => 3, 'riwayat' => 2, 'minat' => 3, 'riwayat_ekskul' => 2, 'prestasi' => 2];

        $totalUtility = [
            'tinggi' => 0,
            'berat' => 0,
            'riwayat' => 0,
            'minat' => 0,
            'riwayat_ekskul' => 0,
            'prestasi' => 0,
        ];

        foreach ($ekskul as $nama_ekskul => $kode_ekskul) {
            // dd($kode_ekskul);die;
            $hasilUtility = [];

            $hasilUtility['tinggi'] = ($data_siswa['tinggi'] - $cmin['tinggi']) / ($cmax['tinggi'] - $cmin['tinggi']);
            $hasilUtility['berat'] = ($data_siswa['berat'] - $cmin['berat']) / ($cmax['berat'] - $cmin['berat']);
            $hasilUtility['riwayat'] = ($data_siswa['riwayat'] - $cmin['riwayat']) / ($cmax['riwayat'] - $cmin['riwayat']);
            $hasilUtility['minat'] = ($data_siswa['minat' . $nama_ekskul] - $cmin['minat']) / ($cmax['minat'] - $cmin['minat']);
            $hasilUtility['riwayat_ekskul'] = ($data_siswa['riwayat' . $nama_ekskul] - $cmin['riwayat_ekskul']) / ($cmax['riwayat_ekskul'] - $cmin['riwayat_ekskul']);
            $hasilUtility['prestasi'] = ($data_siswa['prestasi' . $nama_ekskul] - $cmin['prestasi']) / ($cmax['prestasi'] - $cmin['prestasi']);

            $utilities[$kode_ekskul] = $hasilUtility;
            // dd($utilities);
            $totalUtility['tinggi'] += $hasilUtility['tinggi'];
            $totalUtility['berat'] += $hasilUtility['berat'];
            $totalUtility['riwayat'] += $hasilUtility['riwayat'];
            $totalUtility['minat'] += $hasilUtility['minat'];
            $totalUtility['riwayat_ekskul'] += $hasilUtility['riwayat_ekskul'];
            $totalUtility['prestasi'] += $hasilUtility['prestasi'];
        }
        return ['data' => $utilities, 'total' => $totalUtility];
    }

    private function normalisasiBobot($bobot, $ekskul)
    {
        $normalizedWeights = [];
        foreach ($ekskul as $e) {
            $totalBobot = [];

            $totalBobot['tinggi'] = $bobot['total']['tinggi'] != 0 ? $bobot['data'][$e]['tinggi'] / $bobot['total']['tinggi'] : 0;
            $totalBobot['berat'] = $bobot['total']['berat'] != 0 ? $bobot['data'][$e]['berat'] / $bobot['total']['berat'] : 0;
            $totalBobot['riwayat'] = $bobot['total']['riwayat'] != 0 ? $bobot['data'][$e]['riwayat'] / $bobot['total']['riwayat'] : 0;
            $totalBobot['minat'] = $bobot['total']['minat'] != 0 ? $bobot['data'][$e]['minat'] / $bobot['total']['minat'] : 0;
            $totalBobot['riwayat_ekskul'] = $bobot['total']['riwayat_ekskul'] != 0 ? $bobot['data'][$e]['riwayat_ekskul'] / $bobot['total']['riwayat_ekskul'] : 0;
            $totalBobot['prestasi'] = $bobot['total']['prestasi'] != 0 ? $bobot['data'][$e]['prestasi'] / $bobot['total']['prestasi'] : 0;

            $normalizedWeights[$e] = $totalBobot;
        }
        return $normalizedWeights;
    }

    private function cariNilaiUtilities($ekskul, $normalizedWeights)
    {
        $utilities = [];
        $utilityCount = [];
        foreach ($ekskul as $e) {
            $utility = round(array_sum($normalizedWeights[$e]), 2);

            if (!isset($utilityCount[$utility])) {
                $utilityCount[$utility] = [];
            }
            $utilityCount[$utility][] = $e;
            $utilities[$e] = $utility;
        }

        foreach ($utilityCount as $utility => $items) {
            if (count($items) > 1) {
                $randomKey = array_rand($items);
                $randomItem = $items[$randomKey];
                $utilities[$randomItem] += 0.1;
            }
        }

        return $utilities;

    }

    public function index()
    {
        $page = 'Pemilihan Ekskul';
        $siswa = Auth::user();
        $ekskul = Ekstrakurikuler::get();
        return view('siswa.pages.PemilihanEkskul.index', compact('page', 'siswa', 'ekskul'));
    }

    public function smart(Request $request)
    {
        $ekskul = Ekstrakurikuler::pluck('kode_ekskul', 'nama_ekskul')->toArray();
        $validatedData = $this->validateSmart($request, array_keys($ekskul));
        $hasilSMART = $this->hitungSMART($validatedData, $ekskul);
        $dataBobot = [];
        $userId = Auth::id();
        $hasilBobotTotal = HasilBobotTotal::create([
            'bobot_tinggi_total' => $hasilSMART['total']['tinggi'],
            'bobot_berat_total' => $hasilSMART['total']['berat'],
            'bobot_riwayat_total' => $hasilSMART['total']['riwayat'],
            'bobot_minat_total' => $hasilSMART['total']['minat'],
            'bobot_riwayat_ekskul_total' => $hasilSMART['total']['riwayat_ekskul'],
            'bobot_prestasi_total' => $hasilSMART['total']['prestasi'],
        ]);

        foreach ($hasilSMART['data'] as $kdEkskul => $hasil) {
            $dataBobot[] = [
                'id_siswa' => $userId,
                'id_hasil_bobot_total' => $hasilBobotTotal->id,
                'kd_ekskul' => $kdEkskul,
                'bobot_tinggi' => $hasil['tinggi'] ?? 0,
                'bobot_berat' => $hasil['berat'] ?? 0,
                'bobot_riwayat' => $hasil['riwayat'] ?? 0,
                'bobot_minat' => $hasil['minat'] ?? 0,
                'bobot_riwayat_ekskul' => $hasil['riwayat_ekskul'] ?? 0,
                'bobot_prestasi' => $hasil['prestasi'] ?? 0,
            ];
        }

        HasilBobot::insert($dataBobot);

        $normalizedSMART = $this->normalisasiBobot($hasilSMART, $ekskul);
        $utilities = $this->cariNilaiUtilities($ekskul, $normalizedSMART);

        $datanormalisasi = [];
        foreach ($normalizedSMART as $kd_ekskul => $data) {
            $datanormalisasi[] = [
                'id_siswa' => $userId,
                'kd_ekskul' => $kd_ekskul,
                'id_hasil_bobot_total' => $hasilBobotTotal->id,
                'normalisasi_tinggi' => $data['tinggi'],
                'normalisasi_berat' => $data['berat'],
                'normalisasi_riwayat' => $data['riwayat'],
                'normalisasi_minat' => $data['minat'],
                'normalisasi_riwayat_ekskul' => $data['riwayat_ekskul'],
                'normalisasi_prestasi' => $data['prestasi'],
                'hasil_utilities' => $utilities[$kd_ekskul],
            ];
        }

        HasilNormalisasiDanUtilities::insert($datanormalisasi);
        arsort($utilities);
        $ekskulSmart = key($utilities);
        $nilaiSmart = reset($utilities);

        HasilSmart::create([
            'id_siswa' => Auth::id(),
            'hasil_smart' => $nilaiSmart,
            'id_hasil_bobot_total' => $hasilBobotTotal->id,
            'id_ekskul' => $ekskulSmart,
        ]);

        return redirect()->route('pemilihan-hasil.show', $hasilBobotTotal->id)->with('success', 'Nilai SMART berhasil ditambahkan');
    }

    /**
     * Show the result of SMART
     *
     * @return \Illuminate\Http\Response
     */
    public function hasil($idBobotTotal)
    {
        // Page title
        $page = 'Pemilihan Ekskul';

        // Get the hasil bobot data
        $hasilBobot = HasilBobot::with(['rEkstrakurikuler', 'rHasilBobotTotal'])
            ->where('id_siswa', Auth::id())
            ->where('id_hasil_bobot_total', $idBobotTotal)
            ->get();

        // Get the hasil bobot total data
        $hasilBobotTotal = HasilBobotTotal::find($idBobotTotal);

        // Get the hasil normalisasi data
        $hasilNormalisasi = HasilNormalisasiDanUtilities::with('rEkstrakurikuler')->where('id_siswa', Auth::id())->where('id_hasil_bobot_total', $idBobotTotal)->get();

        // Find the rekomendasi
        $rekomendasi = HasilSmart::where('id_hasil_bobot_total', $idBobotTotal)->first();
        // $rekomendasi = $hasilNormalisasi->max(function ($item) {
        //     return [$item->rEkstrakurikuler->nama_ekskul, $item->hasil_utilities];
        // });
        // Return the view
        return view('siswa.pages.PemilihanEkskul.hasil', compact('page', 'hasilBobot', 'hasilBobotTotal', 'hasilNormalisasi', 'rekomendasi'));
    }
}
