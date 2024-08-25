@extends('admin.app')

@section('title', 'Hasil SMART')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Hasil SMART</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-end">
                        <a href="#" class="btn bg-gradient-success"><i class="bi bi-plus-circle"></i><span
                                class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 py-2">
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
                                        <x-admin.th>Tanggal Proses</x-admin.th>
                                        <x-admin.th>Nilai SMART</x-admin.th>
                                        <x-admin.th>Rekomendasi Ekskul</x-admin.th>
                                        <x-admin.th>Cek Hasil Pemilihan</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot

                                <tr>
                                    <x-admin.td class="text-center">1</x-admin.td>
                                    <x-admin.td class="text-center">2000</x-admin.td>
                                    <x-admin.td class="text-center">Budi</x-admin.td>
                                    <x-admin.td class="text-center">Pria</x-admin.td>
                                    <x-admin.td class="text-center">11</x-admin.td>
                                    <x-admin.td class="text-center">SMA</x-admin.td>
                                    <x-admin.td class="text-center">01-01-2022</x-admin.td>
                                    <x-admin.td class="text-center">90</x-admin.td>
                                    <x-admin.td class="text-center">
                                        {{-- <span
                                            class="bg-gradient-warning py-2 px-4 rounded-pill text-light fw-bold">Renang</span>
                                        <span
                                            class="bg-gradient-primary py-2 px-4 rounded-pill text-light fw-bold">Pramuka</span> --}}
                                        <span
                                            class="bg-gradient-success py-2 px-4 rounded-pill text-light fw-bold">Futsal</span>
                                        {{-- <span
                                            class="bg-gradient-danger py-2 px-4 rounded-pill text-light fw-bold">Basket</span>
                                        <span
                                            class="bg-gradient-info py-2 px-4 rounded-pill text-light fw-bold">Paskibra</span> --}}
                                    </x-admin.td>
                                    <x-admin.td class="text-center">
                                        <a href="{{ route('smart.detail') }}" class="btn bg-gradient-info mt-3"><i
                                                class="bi bi-eye-fill"></i></i><span class="text-capitalize ms-1">Cek
                                                Seluruh Hasil</span></a>
                                    </x-admin.td>
                                    <x-admin.td class="text-center">
                                        <a href="#" class="btn bg-gradient-danger mt-3" data-bs-toggle="modal"
                                            data-bs-target="#hapusSmart"><i class="bi bi-trash-fill"></i><span
                                                class="text-capitalize ms-1">Hapus</span></a>
                                    </x-admin.td>

                                    <!-- Modal Hapus Hasil -->
                                    <div class="modal fade" id="hapusSmart" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusSmartLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="hapusSmartLabel">Hapus Hasil SMART
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
                                                    <a href="#" type="submit" class="btn btn-sm btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>

                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add SMART -->
    <div class="modal fade" id="addSmart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addSmartLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addSmartLabel">Tambah Hasil SMART</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <Label>Nama Siswa</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="namaSiswa[]"
                            id="namaSiswa">
                            <option selected hidden>--- Pilih Siswa ---</option>
                            <option>Budi</option>
                            <option>Ani</option>
                        </select>
                        <x-admin.input type="text" placeholder="Kelas" label="Kelas" name="kelas" />
                        <x-admin.input type="text" placeholder="Jenjang" label="Jenjang" name="jenjang" />
                        <x-admin.input type="text" placeholder="Pilihan Ekskul" label="Pilihan Ekskul" name="pilihan" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
