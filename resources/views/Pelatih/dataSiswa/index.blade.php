@extends('admin.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Siswa Ekskul Renang</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-end">
                        <a href="#" class="btn bg-gradient-success"><i class="bi bi-plus-circle"></i><span
                                class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body pb-5 px-5">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>NIS</x-admin.th>
                                        <x-admin.th>Nama Siswa</x-admin.th>
                                        <x-admin.th>Jenis Kelamin</x-admin.th>
                                        <x-admin.th>Kelas</x-admin.th>
                                        <x-admin.th>Jenjang</x-admin.th>
                                    </tr>
                                @endslot
                                @foreach ($siswa as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nis ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->gender ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->kelas ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->jenjang ?? '' }}</x-admin.td>
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
