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

                                @foreach ($kriteria as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->kode ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama ?? '' }}</x-admin.td>
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
