@extends('admin.app')

@section('title', 'Edit Data Ekskul')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Edit Data Ekskul {{ $ekskul->nama_ekskul }}</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-5">
                            <form action="{{ route('ekskul.update', $ekskul->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="text-center">
                                    <img src="{{ asset('dist/assets/img/ekskul/' . $ekskul->image) }}" alt=""
                                        style="max-width: 800px">
                                </p>
                                <x-admin.input type="text" placeholder="Kode Ekskul" label="Kode" name="kode"
                                    value="{{ $ekskul->kode_ekskul ?? '' }}" />
                                <x-admin.input type="text" placeholder="Nama Ekskul" label="Nama" name="nama"
                                    value="{{ $ekskul->nama_ekskul ?? '' }}" />
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Perbarui
                                        Foto</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                                <label>Informasi Ekskul</label>
                                <textarea class="form-control mb-3" name="info" id="info{{ $ekskul->id }}" cols="20" rows="10">
                                                                {{ trim($ekskul->informasi_ekskul ?? '') }}
                                                            </textarea>

                                <div class="editPrestasi">
                                    @if ($ekskul->rPrestasi->isEmpty())
                                        <div class="row me-1 mb-3">
                                            <div class="col-10">
                                                <x-admin.input type="text" placeholder="Prestasi Ekskul" label="Prestasi"
                                                    name="prestasi[]" />
                                            </div>
                                            <div class="col-2 mt-3 pt-3">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    onclick="editPrestasi(this, true)">+</button>
                                            </div>
                                        </div>
                                    @else
                                        <label for="">Prestasi</label>
                                        @foreach ($ekskul->rPrestasi as $key => $value)
                                            <div class="row me-1 mb-3">
                                                <div class="col-11">
                                                    <input class="form-control" type="text" placeholder="Prestasi Ekskul"
                                                        name="prestasi[]" value="{{ $value->prestasi }}" />
                                                </div>
                                                @if ($key === 0)
                                                    <div class="col-1">
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            onclick="editPrestasi(this, true)">+</button>
                                                    </div>
                                                @else
                                                    <div class="col-1">
                                                        <button type="button" class="btn btn-sm btn-warning"
                                                            onclick="deleteFormEdit(this)">-</button>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>


                                <div class="mb-5">
                                    <label for="formFile" class="form-label">Dokumentasi</label>
                                    <input class="form-control" type="file" id="formFile" name="dokumentasi" multiple>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editPrestasi(element) {
            var editPrestasiClass = element.closest('.editPrestasi');
            var input = editPrestasiClass.querySelector('input');
            var inputName = input.getAttribute('name');
            var div = document.createElement('div');
            div.className = 'row me-1';
            div.innerHTML = `
            <div class="col-11">
                <input class="form-control" type="text" placeholder="Prestasi Ekskul"
                    name="${inputName}" />
            </div>
            <div class="col-1 mt-1">
                <button type="button" class="btn btn-sm btn-warning"
                    onclick="deleteFormEdit(this)">-</button>
            </div>`;

            editPrestasiClass.appendChild(div);
        }

        function deleteFormEdit(element) {
            var row = element.closest('.row');
            row.remove();
        }
    </script>
@endsection
