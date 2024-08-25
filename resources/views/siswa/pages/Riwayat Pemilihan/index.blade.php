@extends('admin.app')

@section('title', 'Riwayat Pemilihan')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Riwayat Pemilihan</h6>
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>NIS</x-admin.th>
                                        <x-admin.th>Nama Siswa</x-admin.th>
                                        <x-admin.th>Jenis Kelamin</x-admin.th>
                                        <x-admin.th>Tanggal Lahir</x-admin.th>
                                        <x-admin.th>Rekomendasi Ekskul</x-admin.th>
                                    </tr>
                                @endslot

                                <tr>
                                    <x-admin.td class="text-center">2000</x-admin.td>
                                    <x-admin.td class="text-center">Budi</x-admin.td>
                                    <x-admin.td class="text-center">Pria</x-admin.td>
                                    <x-admin.td class="text-center">01-01-2000</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-success py-2 px-4 rounded-pill text-light fw-bold">Futsal</span>
                                    </x-admin.td>
                                </tr>
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
