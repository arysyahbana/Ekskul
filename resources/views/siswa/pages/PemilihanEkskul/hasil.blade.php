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

                    <tr>
                        <x-admin.td class="text-center">Futsal</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Basket</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Renang</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Paskibra</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Pramuka</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center"><span
                                class="bg-gradient-danger py-2 px-3 rounded-pill text-light fw-bold">Total</span></x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0</span>
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

                    <tr>
                        <x-admin.td class="text-center">Futsal</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0.400</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Basket</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0.400</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Renang</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0.400</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Paskibra</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0.400</span>
                        </x-admin.td>
                    </tr>

                    <tr>
                        <x-admin.td class="text-center">Pramuka</x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0.5</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">1</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-success py-2 px-3 rounded-pill text-light fw-bold">0</span>
                        </x-admin.td>
                        <x-admin.td class="text-center py-3">
                            <span class="bg-gradient-warning py-2 px-3 rounded-pill text-light fw-bold">0.400</span>
                        </x-admin.td>
                    </tr>
                </x-admin.table>
            </div>
        </div>

        <div class="card mb-4 bg-gradient-primary text-light text-center fw-bolder">
            <div class="card-body">
                <p>Peminatan Ekstrakurikuler yang direkomendasikan untuk anda adalah</p>
                <p class="fw-bold fs-2">"Renang"</p>
                <p>Berdasarkan nilai SMART tertinggi yaitu <span class="fs-4">"2.4"</span></p>
            </div>
        </div>
    </div>
@endsection
