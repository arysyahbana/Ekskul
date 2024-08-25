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
                                <td>2000</td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td class="px-2">:</td>
                                <td>Budi</td>
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
                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-warning py-2 px-4 rounded-pill text-light fw-bold">Renang</span>
                                    </x-admin.td>
                                    <x-admin.td class="text-center">2.4</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">2</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-primary py-2 px-4 rounded-pill text-light fw-bold">Pramuka</span>
                                    </x-admin.td>
                                    <x-admin.td class="text-center">1.4</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">3</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-success py-2 px-4 rounded-pill text-light fw-bold">Futsal</span>
                                    </x-admin.td>
                                    <x-admin.td class="text-center">0.4</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">4</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-danger py-2 px-4 rounded-pill text-light fw-bold">Basket</span>
                                    </x-admin.td>
                                    <x-admin.td class="text-center">0.4</x-admin.td>
                                </tr>
                                <tr>
                                    <x-admin.td class="text-center">5</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-info py-2 px-4 rounded-pill text-light fw-bold">Paskibra</span>
                                    </x-admin.td>
                                    <x-admin.td class="text-center">0.4</x-admin.td>
                                </tr>
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
