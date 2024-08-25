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

                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center">2000</x-admin.td>
                                    <x-admin.td class="text-center">Budi</x-admin.td>
                                    <x-admin.td class="text-center">Pria</x-admin.td>
                                    <x-admin.td class="text-center">11</x-admin.td>
                                    <x-admin.td class="text-center">SMA</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center">2000</x-admin.td>
                                    <x-admin.td class="text-center">Budi</x-admin.td>
                                    <x-admin.td class="text-center">Pria</x-admin.td>
                                    <x-admin.td class="text-center">11</x-admin.td>
                                    <x-admin.td class="text-center">SMA</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center">2000</x-admin.td>
                                    <x-admin.td class="text-center">Budi</x-admin.td>
                                    <x-admin.td class="text-center">Pria</x-admin.td>
                                    <x-admin.td class="text-center">11</x-admin.td>
                                    <x-admin.td class="text-center">SMA</x-admin.td>
                                </tr>
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
