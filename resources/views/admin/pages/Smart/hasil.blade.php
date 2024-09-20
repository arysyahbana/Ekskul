@extends('admin.app')

@section('title', 'Hasil SMART')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Detail Hasil SMART</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 py-5">
                        <table class="text-dark text-sm">
                            <tr>
                                <td>NIS Siswa</td>
                                <td class="px-2">:</td>
                                <td>{{ $hasilSmart[0]->rSiswa->nis }}</td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td class="px-2">:</td>
                                <td>{{ $hasilSmart[0]->rSiswa->nama }}</td>
                            </tr>
                        </table>
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Nama Ekskul</x-admin.th>
                                        <x-admin.th>Nilai SMART</x-admin.th>
                                    </tr>
                                @endslot
                                @foreach ($hasilSmart as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center py-3">
                                            <span
                                                class="bg-gradient-warning py-2 px-4 rounded-pill text-light fw-bold">{{$item->rEkstrakurikuler->nama_ekskul}}</span>
                                        </x-admin.td>
                                        <x-admin.td class="text-center">{{$item->hasil_utilities}}</x-admin.td>
                                    </tr>
                                @endforeach
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
