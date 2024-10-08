@extends('admin.app')

@section('title', 'Data Kriteria')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Kriteria</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal"
                            data-bs-target="#addKriteria"><i class="bi bi-plus-circle"></i><span
                                class="text-capitalize ms-1">Tambah</span></a>
                        <a href="{{ route('kriteria.download') }}" class="btn bg-gradient-success"><i class="bi bi-plus-circle"></i><span
                                class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Kode</x-admin.th>
                                        <x-admin.th>Nama Kriteria</x-admin.th>
                                        <x-admin.th>Bobot</x-admin.th>
                                        <x-admin.th>Jenis</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot

                                @foreach ($kriteria as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->kode ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->bobot ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->jenis ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editKriteria{{ $item->id }}"><i
                                                    class="bi bi-pencil-fill"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusKriteria{{ $item->id }}"><i class="bi bi-trash-fill"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Kriteria -->
                                        <div class="modal fade" id="editKriteria{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="editKriteriaLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editKriteriaLabel">Edit Data
                                                            Kriteria
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('kriteria.update', $item->id) }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <x-admin.input type="text" placeholder="Kode Kriteria"
                                                                label="Kode" name="kode"
                                                                value="{{ $item->kode ?? '' }}" />
                                                            <x-admin.input type="text" placeholder="Nama Kriteria"
                                                                label="Nama" name="nama"
                                                                value="{{ $item->nama ?? '' }}" />
                                                            <x-admin.input type="text" placeholder="Bobot Kriteria"
                                                                label="Bobot" name="bobot" id="bobotInput"
                                                                value="{{ $item->bobot ?? '' }}" />
                                                            <x-admin.input type="text" placeholder="Jenis Kriteria"
                                                                label="Jenis" name="jenis"
                                                                value="{{ $item->jenis ?? '' }}" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Update</button>
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus Kriteria -->
                                        <div class="modal fade" id="hapusKriteria{{ $item->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKriteriaLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusKriteriaLabel">Hapus Data
                                                            Kriteria
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('dist/assets/img/bin.gif') }}" alt=""
                                                            class="img-fluid w-25">
                                                        <p>Yakin ingin menghapus data?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('kriteria.destroy', $item->id) }}" type="submit"
                                                            class="btn btn-sm btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach

                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Kriteria -->
    <div class="modal fade" id="addKriteria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addKriteriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addKriteriaLabel">Tambah Data Kriteria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kriteria.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <x-admin.input type="text" placeholder="Kode Kriteria" label="Kode" name="kode" />
                        <x-admin.input type="text" placeholder="Nama Kriteria" label="Nama" name="nama" />
                        <x-admin.input type="text" placeholder="Bobot Kriteria" label="Bobot" name="bobot"
                            id="bobotInput" />
                        <x-admin.input type="text" placeholder="Jenis Kriteria" label="Jenis" name="jenis" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('bobotInput').addEventListener('input', function(e) {
            const value = e.target.value;
            const regex = /^\d*\.?\d*$/;

            if (!regex.test(value)) {
                e.target.value = value.slice(0, -1);
            }
        });
    </script>
@endsection
