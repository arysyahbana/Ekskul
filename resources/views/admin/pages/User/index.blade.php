@extends('admin.app')

@section('title', 'Daftar Users')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Daftar Users</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addUsers"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Tambah</span></a>
                        <a href="{{ route('user.download') }}" class="btn bg-gradient-success"><i class="bi bi-plus-circle"></i><span
                                class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>NIS</x-admin.th>
                                        <x-admin.th>Nama</x-admin.th>
                                        <x-admin.th>Jenis Kelamin</x-admin.th>
                                        <x-admin.th>Tanggal Lahir</x-admin.th>
                                        <x-admin.th>Kelas</x-admin.th>
                                        <x-admin.th>Jenjang</x-admin.th>
                                        <x-admin.th>Email</x-admin.th>
                                        <x-admin.th>Role</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot

                                @foreach ($users as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nis ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->gender ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->tgl_lahir ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->kelas ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->jenjang ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->email ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->role ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editUsers{{ $item->id }}"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusUsers{{ $item->id }}"><i class="fa fa-trash"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Users -->
                                        <div class="modal fade" id="editUsers{{ $item->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUsersLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editUsersLabel">Edit Data Users
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('users.update', $item->id) }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <Label>Role</Label>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" name="role">
                                                                <option hidden>--- Pilih ---</option>
                                                                <option value="Admin"
                                                                    {{ $item->role == 'Admin' ? 'selected' : '' }}>Admin
                                                                </option>
                                                                <option value="Siswa"
                                                                    {{ $item->role == 'Siswa' ? 'selected' : '' }}>Siswa
                                                                </option>
                                                                <option value="Kepala Sekolah"
                                                                    {{ $item->role == 'Kepala Sekolah' ? 'selected' : '' }}>
                                                                    Kepala Sekolah</option>
                                                                <option value="Pelatih"
                                                                    {{ $item->role == 'Pelatih' ? 'selected' : '' }}>
                                                                    Pelatih</option>
                                                            </select>
                                                            <x-admin.input type="text"
                                                                placeholder="Dikosongkan selain siswa" label="NIS"
                                                                name="nis" value="{{ $item->nis ?? '' }}" />
                                                            <x-admin.input type="text" placeholder="Nama" label="Nama"
                                                                name="nama" value="{{ $item->nama ?? '' }}" />
                                                            <x-admin.input type="date" placeholder="Tanggal Lahir"
                                                                label="Tanggal Lahir" name="tgl_lahir"
                                                                value="{{ $item->tgl_lahir ?? '' }}" />
                                                            <Label>Jenis Kelamin</Label>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" name="gender">
                                                                <option hidden>--- Pilih ---</option>
                                                                <option value="Pria" @selected($item->gender == 'Pria')>Pria
                                                                </option>
                                                                <option value="Wanita" @selected($item->gender == 'Wanita')>Wanita
                                                                </option>
                                                            </select>
                                                            <x-admin.input type="number"
                                                                placeholder="Dikosongkan selain siswa" label="Kelas"
                                                                name="kelas" value="{{ $item->kelas ?? '' }}" />
                                                            <Label>Jenjang</Label>
                                                            <select class="form-select mb-3"
                                                                aria-label="Default select example" name="role">
                                                                <option value="" hidden>Tidak dipilih jika bukan siswa
                                                                </option>
                                                                <option value="SD">SD</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SMK">SMK</option>
                                                            </select>
                                                            <x-admin.input type="email" placeholder="Email"
                                                                label="Email" name="email"
                                                                value="{{ $item->email ?? '' }}" />
                                                            <Label>Role</Label>
                                                            <x-admin.input type="password" placeholder="********"
                                                                label="Password" name="password" />
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

                                        <!-- Modal Hapus Users -->
                                        <div class="modal fade" id="hapusUsers{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="hapusUsersLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusUsersLabel">Hapus Data User
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('dist/assets/img/bin.gif') }}" alt=""
                                                            class="img-fluid w-25">
                                                        <p>Yakin ingin menghapus data {{ $item->name }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('users.destroy', $item->id) }}" type="submit"
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

    <!-- Modal Add Users -->
    <div class="modal fade" id="addUsers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addUsersLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUsersLabel">Tambah Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <Label>Role</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="role">
                            <option hidden>--- Pilih ---</option>
                            <option value="Admin">Admin</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Pelatih">Pelatih</option>
                        </select>
                        <x-admin.input type="text" placeholder="Dikosongkan selain siswa" label="NIS"
                            name="nis" />
                        <x-admin.input type="text" placeholder="Nama" label="Nama" name="nama" />
                        <x-admin.input type="date" placeholder="Tanggal Lahir" label="Tanggal Lahir"
                            name="tgl_lahir" />
                        <Label>Jenis Kelamin</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="gender">
                            <option hidden>--- Pilih ---</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        <x-admin.input type="number" placeholder="Dikosongkan selain siswa" label="Kelas"
                            name="kelas" />
                        <Label>Jenjang</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="jenjang">
                            <option value="" hidden>Tidak dipilih jika bukan siswa</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMK">SMK</option>
                        </select>
                        <x-admin.input type="email" placeholder="Email" label="Email" name="email" />
                        <x-admin.input type="password" placeholder="********" label="Password" name="password" />
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
