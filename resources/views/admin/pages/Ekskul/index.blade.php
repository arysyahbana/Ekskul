@extends('admin.app')

@section('title', 'Data Ekskul')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Ekskul</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addEkskul"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Tambah</span></a>
                        <a href="{{ route('ekskul.download') }}" class="btn bg-gradient-success"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Kode Ektrakurikuler</x-admin.th>
                                        <x-admin.th>Nama Ekstrakurikuler</x-admin.th>
                                        <x-admin.th>Foto</x-admin.th>
                                        <x-admin.th>Informasi Ekstrakurikuler</x-admin.th>
                                        <x-admin.th>Prestasi Ekstrakurikuler</x-admin.th>
                                        <x-admin.th>Dokumentasi Ekstrakurikuler</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot
                                @foreach ($ekskul as $item)
                                    <tr>
                                        <x-admin.td class="text-center">{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->kode_ekskul ?? '' }}</x-admin.td>
                                        <x-admin.td class="text-center">{{ $item->nama_ekskul }}</x-admin.td>
                                        <x-admin.td class="text-center">
                                            <img src="{{ asset('dist/assets/img/ekskul/' . $item->image) }}" alt=""
                                                style="max-width: 200px" class="img-thumbnail">
                                        </x-admin.td>
                                        <x-admin.td maxWidth="300px">
                                            {{ trim($item->informasi_ekskul) }}
                                        </x-admin.td>
                                        <x-admin.td>
                                            <ul>
                                                @foreach ($item->rPrestasi as $item2)
                                                    <li>{{ $item2->prestasi }}</li>
                                                @endforeach
                                            </ul>
                                        </x-admin.td>
                                        <x-admin.td class="text-center">
                                            @foreach ($item->rDokumentasi as $item3)
                                                <a href="{{ asset('dist/assets/img/ekskul/dokumentasi/' . $item3->dokumentasi) }}"
                                                    target="_blank">Dokumentasi {{ $loop->iteration }}</a> <br>
                                            @endforeach
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editEkskul{{ $item->id }}"><i
                                                    class="bi bi-pencil-fill"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusEkskul{{ $item->id }}"><i
                                                    class="bi bi-trash-fill"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Ekskul -->
                                        <div class="modal fade" id="editEkskul{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="editEkskulLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editEkskulLabel">Edit Data
                                                            Ekstrakurikuler</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form id="editEkskulForm{{ $item->id }}"
                                                        action="{{ route('ekskul.update', $item->id) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p class="text-center">
                                                                <img src="{{ asset('dist/assets/img/ekskul/' . $item->image) }}"
                                                                    alt="" style="max-width: 400px">
                                                            </p>
                                                            <x-admin.input type="text" placeholder="Kode Ekskul"
                                                                label="Kode" name="kode"
                                                                value="{{ $item->kode_ekskul ?? '' }}" />
                                                            <x-admin.input type="text" placeholder="Nama Ekskul"
                                                                label="Nama" name="nama"
                                                                value="{{ $item->nama_ekskul ?? '' }}" />
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Perbarui
                                                                    Foto</label>
                                                                <input class="form-control" type="file" id="formFile"
                                                                    name="image">
                                                            </div>
                                                            <label>Informasi Ekskul</label>
                                                            <textarea class="form-control" name="info" id="info{{ $item->id }}" cols="20" rows="10">
                                                                {{ trim($item->informasi_ekskul ?? '') }}
                                                            </textarea>

                                                            <div class="editPrestasi">
                                                                @if ($item->rPrestasi->isEmpty())
                                                                    <div class="row me-1">
                                                                        <div class="col-10">
                                                                            <x-admin.input type="text"
                                                                                placeholder="Prestasi Ekskul"
                                                                                label="Prestasi" name="prestasi[]" />
                                                                        </div>
                                                                        <div class="col-2 mt-3 pt-3">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-primary"
                                                                                onclick="addInputText(this, true)">+</button>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    @foreach ($item->rPrestasi as $key => $value)
                                                                        <div class="row me-1">
                                                                            <div class="col-10">
                                                                                <x-admin.input type="text"
                                                                                    placeholder="Prestasi Ekskul"
                                                                                    label="Prestasi" name="prestasi[]"
                                                                                    value="{{ $value->prestasi }}" />
                                                                            </div>
                                                                            @if ($key === 0)
                                                                                <div class="col-2 mt-3 pt-3">
                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-primary"
                                                                                        onclick="addInputText(this, true)">+</button>
                                                                                </div>
                                                                            @else
                                                                                <div class="col-2 mt-1">
                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-warning"
                                                                                        onclick="deleteForm(this)">-</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="formFile"
                                                                    class="form-label">Dokumentasi</label>
                                                                <input class="form-control" type="file" id="formFile"
                                                                    name="dokumentasi" multiple>
                                                            </div>
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

                                        <!-- Modal Hapus Ekskul -->
                                        <div class="modal fade" id="hapusEkskul{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="hapusEkskulLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusEkskulLabel">Hapus Data
                                                            Ekstrakurikuler
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
                                                        <a href="{{ route('ekskul.destroy', $item->id) }}" type="submit"
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

    <!-- Modal Add Ekskul -->
    <div class="modal fade" id="addEkskul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addEkskulLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEkskulLabel">Tambah Data Ekstrakurikuler</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addEkskulForm" action="{{ route('ekskul.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <x-admin.input type="text" placeholder="Kode Ekskul" label="Kode" name="kode" />
                        <x-admin.input type="text" placeholder="Nama Ekskul" label="Nama" name="nama" />
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        <label>Informasi Ekskul</label>
                        <textarea class="form-control mb-3" name="info" id="info" cols="20" rows="10"></textarea>

                        <div class="addPrestasi">
                            <div class="row me-1">
                                <div class="col-10">
                                    <x-admin.input type="text" placeholder="Prestasi Ekskul" label="Prestasi"
                                        name="prestasi[]" />
                                </div>
                                <div class="col-2 mt-3 pt-3">
                                    <button type="button" class="btn btn-sm btn-primary"
                                        onclick="addInputText(this)">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Dokumentasi</label>
                            <input class="form-control" type="file" id="formFile" name="dokumentasi[]" multiple>
                        </div>
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
        document.getElementById('addEkskulForm').addEventListener('submit', function(event) {
            var textarea = document.getElementById('info');
            textarea.value = textarea.value.trim();
        });

        // Normalize whitespace in the edit form
        function setTextWithNormalizedWhitespace(textareaId, text) {
            const textarea = document.getElementById(textareaId);
            const normalizedText = text.replace(/\s+/g, ' ').trim(); // Replace multiple spaces with a single space and trim
            textarea.value = normalizedText;
        }

        // Use the correct ID for each instance of the edit form
        @foreach ($ekskul as $item)
            setTextWithNormalizedWhitespace('info{{ $item->id }}', '{{ trim($item->informasi_ekskul ?? '') }}');
        @endforeach
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editEkskulForm');
            console.log(form);
        });

        function addInputText(element, isEdit = false) {
            console.log(form.innerHTML);
            var containerClass = isEdit ? 'editPrestasi' : 'addPrestasi';
            var container = $(element).closest(`.${containerClass}`);
            var inputName = container.find('input').attr('name');

            var html = `
            <div class="row me-1">
                <div class="col-10">
                    <input type="text" class="form-control" placeholder="Prestasi Ekskul" value=""
                        name="${inputName}" id=""/>
                </div>
                <div class="col-2 mt-1">
                    <button type="button" class="btn btn-sm btn-warning"
                        onclick="deleteForm(this)">-</button>
                </div>
            </div>
            `;

            container.append(html);
        }


        function deleteForm(element) {
            var row = element.closest('.row');
            row.remove();
        }
    </script>
@endsection
