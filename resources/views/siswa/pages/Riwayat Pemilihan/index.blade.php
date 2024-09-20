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
                                        <x-admin.th>Cek Hasil Pemilihan</x-admin.th>
                                    </tr>
                                @endslot

                                @foreach ($rekomendasi as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ Auth::user()->nis }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ Auth::user()->nama }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ Auth::user()->gender }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ Auth::user()->tgl_lahir }}</x-admin.td>
                                        <x-admin.td class="text-center py-3">
                                            <span
                                                class="bg-gradient-success py-2 px-4 rounded-pill text-light fw-bold">{{ $item->rEkstrakurikuler->nama_ekskul }}</span>
                                        </x-admin.td>
                                        <x-admin.td class="text-center">
                                            <a href="{{ route('riwayat-pemilihan.detail', $item->id) }}"
                                                class="btn bg-gradient-info mt-3"><i class="bi bi-eye-fill"></i></i><span
                                                    class="text-capitalize ms-1">Cek
                                                    Detail Hasil</span></a>
                                        </x-admin.td>
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
