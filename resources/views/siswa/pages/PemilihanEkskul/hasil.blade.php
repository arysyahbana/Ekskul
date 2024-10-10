@extends('admin.app')

@section('title', 'Pemilihan Ekskul')

@section('content')
    <div class="container-fluid py-4">

        <div class="card mb-4">
            <div class="card-header">
                <p>Hasil Bobot Kriteria</p>
            </div>
            <div class="card-body table-responsive">
                <x-admin.table>
                    @slot('header')
                        <tr>
                            <x-admin.th>Nama Ekstrakurikuler</x-admin.th>
                            <x-admin.th>Nilai Tinggi Badan</x-admin.th>
                            <x-admin.th>Nilai Berat Badan</x-admin.th>
                            <x-admin.th>Nilai Riwayat Penyakit</x-admin.th>
                            <x-admin.th>Nilai Minat</x-admin.th>
                            <x-admin.th>Nilai Riwayat Ekskul</x-admin.th>
                            <x-admin.th>Nilai Prestasi</x-admin.th>
                        </tr>
                    @endslot
                    @foreach ($hasilBobot as $item)
                        <tr>
                            <x-admin.td class="text-center">{{ $item->rEkstrakurikuler->nama_ekskul }}</x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span
                                    class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{ $item->bobot_tinggi }}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span
                                    class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{ $item->bobot_berat }}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span
                                    class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{ $item->bobot_riwayat }}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span
                                    class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{ $item->bobot_minat }}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span
                                    class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{ $item->bobot_riwayat_ekskul }}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span
                                    class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{ $item->bobot_prestasi }}</span>
                            </x-admin.td>
                        </tr>
                    @endforeach


                    <tr>
                        <x-admin.td class="text-center"><span
                                class="bg-gradient-danger py-2 px-3 rounded-pill text-light fw-bold">Total</span></x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span
                                class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{ $hasilBobotTotal->bobot_tinggi_total }}</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span
                                class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{ $hasilBobotTotal->bobot_berat_total }}</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span
                                class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{ $hasilBobotTotal->bobot_riwayat_total }}</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span
                                class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{ $hasilBobotTotal->bobot_minat_total }}</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span
                                class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{ $hasilBobotTotal->bobot_riwayat_ekskul_total }}</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span
                                class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{ $hasilBobotTotal->bobot_prestasi_total }}</span>
                        </x-admin.td>
                    </tr>
                </x-admin.table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <p>Hasil Normalisasi & Utilities</p>
            </div>
            <div class="card-body table-responsive">
                <x-admin.table>
                    @slot('header')
                        <tr>
                            <x-admin.th>Nama Ekstrakurikuler</x-admin.th>
                            <x-admin.th>Nilai Tinggi Badan</x-admin.th>
                            <x-admin.th>Nilai Berat Badan</x-admin.th>
                            <x-admin.th>Nilai Riwayat Penyakit</x-admin.th>
                            <x-admin.th>Nilai Minat</x-admin.th>
                            <x-admin.th>Nilai Riwayat Ekskul</x-admin.th>
                            <x-admin.th>Nilai Prestasi</x-admin.th>
                            <x-admin.th>Total Nilai</x-admin.th>
                        </tr>
                    @endslot

                    @foreach ($hasilNormalisasi as $item)
                        <tr>
                            <x-admin.td class="text-center">{{$item->rEkstrakurikuler->nama_ekskul}}</x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{$item->normalisasi_tinggi}}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{$item->normalisasi_berat}}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{$item->normalisasi_riwayat}}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{$item->normalisasi_minat}}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{$item->normalisasi_riwayat_ekskul}}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">{{$item->normalisasi_prestasi}}</span>
                            </x-admin.td>
                            <x-admin.td class="text-center py-3">
                                <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">{{$item->hasil_utilities}}</span>
                            </x-admin.td>
                        </tr>
                    @endforeach

                </x-admin.table>
            </div>
        </div>

        <div class="card mb-4 bg-gradient-primary text-light text-center fw-bolder">
            <div class="card-body">
                <p>Peminatan Ekstrakurikuler yang direkomendasikan untuk anda adalah</p>
                <p class="fw-bold fs-2">"{{$rekomendasi->hasil_smart}}"</p>
                <p>Berdasarkan nilai SMART tertinggi yaitu <span class="fs-4">"{{$rekomendasi->rEkstrakurikuler->nama_ekskul}}"</span></p>
            </div>
        </div>
    </div>
@endsection
