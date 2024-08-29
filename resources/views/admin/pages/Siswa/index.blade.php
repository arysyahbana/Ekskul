@extends('admin.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Siswa</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-end">
                        {{-- <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addSiswa"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Tambah</span></a> --}}
                        <a href="{{ route('siswa.download') }}" class="btn bg-gradient-success"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
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
                                        {{-- <x-admin.th>Action</x-admin.th> --}}
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
                                        {{-- <x-admin.td class="text-center">
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editSiswa"><i class="bi bi-pencil-fill"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusSiswa"><i class="bi bi-trash-fill"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Siswa -->
                                        <div class="modal fade" id="editSiswa" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSiswaLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editSiswaLabel">Edit Data
                                                            Siswa
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="#" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <x-admin.input type="number" placeholder="NIS Siswa"
                                                                label="NIS" name="nis" />

                                                            <x-admin.input type="text" placeholder="Nama Siswa"
                                                                label="Nama" name="nama" />

                                                            <Label>Jenis Kelamin</Label>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" name="gender[]"
                                                                id="gender">
                                                                <option selected hidden>--- Pilih Jenis Kelamin ---</option>
                                                                <option value="Pria">Pria</option>
                                                                <option value="Wanita">Wanita</option>
                                                            </select>

                                                            <x-admin.input type="number" placeholder="Kelas" label="Kelas"
                                                                name="kelas" />

                                                            <Label>Jenjang</Label>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" name="jenjang[]"
                                                                id="jenjang">
                                                                <option selected hidden>--- Pilih Jenjang ---</option>
                                                                <option value="SD">SD</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SMA">SMA</option>
                                                            </select>
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

                                        <!-- Modal Hapus Siswa -->
                                        <div class="modal fade" id="hapusSiswa" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusSiswaLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusSiswaLabel">Hapus Data
                                                            Siswa
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
                                                        <a href="#" type="submit"
                                                            class="btn btn-sm btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </tr>
                                @endforeach


                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Siswa -->
    {{-- <div class="modal fade" id="addSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addSiswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addSiswaLabel">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">

                        <x-admin.input type="number" placeholder="NIS Siswa" label="NIS" name="nis" />

                        <x-admin.input type="text" placeholder="Nama Siswa" label="Nama" name="nama" />

                        <Label>Jenis Kelamin</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="gender[]"
                            id="gender">
                            <option selected hidden>--- Pilih Jenis Kelamin ---</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>

                        <x-admin.input type="number" placeholder="Kelas" label="Kelas" name="kelas" />

                        <Label>Jenjang</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="jenjang[]"
                            id="jenjang">
                            <option selected hidden>--- Pilih Jenjang ---</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
