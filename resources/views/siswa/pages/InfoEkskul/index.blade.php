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

                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center">Ek001</x-admin.td>
                                    <x-admin.td class="text-center">Voli</x-admin.td>
                                    <x-admin.td class="text-center">
                                        <img src="{{ asset('dist/assets/img/futsal.jpg') }}" alt=""
                                            style="max-width: 200px" class="img-thumbnail">
                                    </x-admin.td>
                                    <x-admin.td maxWidth="300px">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Libero imperdiet porta luctus
                                        sem parturient molestie ullamcorper. Arcu eu enim; est ut fames rhoncus duis.
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Libero imperdiet porta luctus
                                        sem parturient molestie ullamcorper. Arcu eu enim; est ut fames rhoncus duis.
                                        sem parturient molestie ullamcorper. Arcu eu enim; est ut fames rhoncus duis.
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
