@extends('admin.app')

@section('title', 'Informasi Ekskul')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Informasi Ekskul</h6>
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Kode Ektrakurikuler</x-admin.th>
                                        <x-admin.th>Nama Ekstrakurikuler</x-admin.th>
                                        <x-admin.th>Foto</x-admin.th>
                                        <x-admin.th>Informasi Ekstrakurikuler</x-admin.th>
                                    </tr>
                                @endslot

                                @foreach ($ekskul as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->kode_ekskul ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama_ekskul ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">
                                            <img src="{{ asset('dist/assets/img/ekskul/' . $item->image) }}" alt=""
                                                style="max-width: 200px" class="img-thumbnail">
                                        </x-admin.td>
                                        <x-admin.td maxWidth="300px">
                                            {{ $item->informasi_ekskul ?? '' }}
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
