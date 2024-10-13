@extends('admin.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Siswa Ekskul</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <p class="pt-2 fs-5 fw-bold">Wali Kelas 10 {{ Auth::user()->jurusan }} <span
                                class="text-success">({{ Auth::user()->jenjang }})</span></p>
                        <a href="{{ route('download.wali') }}" class="btn bg-gradient-success"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body pb-5 px-5">
                        <ul class="nav nav-tabs">
                            @foreach ($ekskul as $item)
                                <li class="nav-item">
                                    <a class="nav-link" href="#"
                                        data-ekskul="{{ $item->kode_ekskul }}">{{ $item->nama_ekskul }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="table-responsive p-0">
                            @foreach ($ekskul as $item)
                                <div id="{{ $item->kode_ekskul }}-content" class="content-section" style="display: none;">
                                    <table class="my-3 text-dark text-sm">
                                        <tr>
                                            <td>Nama Pelatih</td>
                                            <td class="px-2">:</td>
                                            <td>{{ $item->rPelatih?->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>No HP Pelatih</td>
                                            <td class="px-2">:</td>
                                            <td>08898798</td>
                                        </tr>
                                    </table>

                                    <x-admin.table id="ekskultes{{ $loop->index }}_table">
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
                                        @foreach ($siswa[$item->kode_ekskul] as $siswa1)
                                            <tr>
                                                <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                                <x-admin.td class="text-center">{{ $siswa1['nis'] }}</x-admin.td>
                                                <x-admin.td class="text-center">{{ $siswa1['nama'] }}</x-admin.td>
                                                <x-admin.td class="text-center">{{ $siswa1['gender'] }}</x-admin.td>
                                                <x-admin.td class="text-center">{{ $siswa1['kelas'] }}</x-admin.td>
                                                <x-admin.td class="text-center">{{ $siswa1['jenjang'] }}</x-admin.td>
                                            </tr>
                                        @endforeach
                                    </x-admin.table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-tabs .nav-link');
            const contentSections = document.querySelectorAll('.content-section');

            function showContent(tabName) {
                contentSections.forEach(content => {
                    if (content.id === tabName + '-content') {
                        content.style.display = 'block';
                    } else {
                        content.style.display = 'none';
                    }
                });
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    showContent(this.getAttribute('data-ekskul'));
                });
            });

            // Show the first ekskul content by default
            tabs[0].classList.add('active');
            showContent(tabs[0].getAttribute('data-ekskul'));

            // Initialize DataTables for each table
            const tables = document.querySelectorAll('table[id^="ekskultes"]');
            tables.forEach(table => {
                $(table).DataTable();
            });
        });
    </script>
@endsection
