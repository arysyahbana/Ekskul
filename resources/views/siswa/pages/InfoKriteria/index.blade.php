@extends('admin.app')

@section('title', 'Informasi Kriteria')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Informasi Kriteria</h6>
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Kode Kriteria</x-admin.th>
                                        <x-admin.th>Nama Kriteria</x-admin.th>
                                    </tr>
                                @endslot

                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center">K1</x-admin.td>
                                    <x-admin.td class="text-center">Tinggi Badan</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">2</x-admin.td>
                                    <x-admin.td class="text-center">K2</x-admin.td>
                                    <x-admin.td class="text-center">Berat Badan</x-admin.td>
                                </tr>
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
