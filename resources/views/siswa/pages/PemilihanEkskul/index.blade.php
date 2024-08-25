@extends('admin.app')

@section('title', 'Pemilihan Ekskul')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Pemilihan Ekskul</h6>
                <div class="card mb-4">
                    {{-- <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>NIS</x-admin.th>
                                        <x-admin.th>Nama Siswa</x-admin.th>
                                        <x-admin.th>Jenis Kelamin</x-admin.th>
                                        <x-admin.th>Tanggal Lahir</x-admin.th>
                                        <x-admin.th>Rekomendasi Ekskul</x-admin.th>
                                    </tr>
                                @endslot

                                <tr>
                                    <x-admin.td class="text-center">2000</x-admin.td>
                                    <x-admin.td class="text-center">Budi</x-admin.td>
                                    <x-admin.td class="text-center">Pria</x-admin.td>
                                    <x-admin.td class="text-center">01-01-2000</x-admin.td>
                                    <x-admin.td class="text-center py-3">
                                        <span
                                            class="bg-gradient-success py-2 px-4 rounded-pill text-light fw-bold">Futsal</span>
                                    </x-admin.td>
                                </tr>
                            </x-admin.table>
                        </div>
                    </div> --}}
                    <div class="card-body p-5">
                        <div class="container mt-5">
                            <div class="progress gap-1">
                                <div class="progress-bar bg-success py-2" id="step1" style="width: 25%;"
                                    role="progressbar">
                                    Kriteria</div>
                                <div class="progress-bar bg-secondary py-2" id="step2" style="width: 25%;"
                                    role="progressbar">Minat</div>
                                <div class="progress-bar bg-secondary py-2" id="step3" style="width: 25%;"
                                    role="progressbar">Pernah Mengikuti Ekskul Sebelumnya</div>
                                <div class="progress-bar bg-secondary py-2" id="step4" style="width: 25%;"
                                    role="progressbar">Prestasi</div>
                            </div>

                            <form action="#" method="POST">
                                @csrf
                                <div class="mt-4" id="step1-content">
                                    <p class="fw-bold">Kriteria Umum</p>

                                    <x-admin.input type="text" placeholder="20001212" label="NIS Siswa" name="nis" />
                                    <x-admin.input type="text" placeholder="Budi" label="Nama Siswa" name="nama" />

                                    <Label>Tinggi Badan</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="tinggi[]"
                                        id="tinggi">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="<151-160">
                                            < 151 - 160</option>
                                    </select>

                                    <Label>Berat Badan</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="berat[]"
                                        id="berat">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="46-50">
                                            46 - 50</option>
                                    </select>

                                    <Label>Riwayat Penyakit</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="riwayat[]"
                                        id="riwayat">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Ada Riwayat">Ada Riwayat</option>
                                        <option value="Tidak Ada Riwayat">Tidak Ada Riwayat</option>
                                    </select>
                                </div>

                                <div class="mt-4" id="step2-content">
                                    <p class="fw-bold">Kriteria Minat</p>

                                    <Label>Futsal</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="futsal[]"
                                        id="futsal">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Sangat Berminat">Sangat Berminat</option>
                                        <option value="Berminat">Berminat</option>
                                        <option value="Cukup Berminat">Cukup Berminat</option>
                                        <option value="Tidak Berminat">Tidak Berminat</option>
                                    </select>

                                    <Label>Basket</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="basket[]"
                                        id="basket">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Sangat Berminat">Sangat Berminat</option>
                                        <option value="Berminat">Berminat</option>
                                        <option value="Cukup Berminat">Cukup Berminat</option>
                                        <option value="Tidak Berminat">Tidak Berminat</option>
                                    </select>

                                    <Label>Renang</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="renang[]"
                                        id="renang">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Sangat Berminat">Sangat Berminat</option>
                                        <option value="Berminat">Berminat</option>
                                        <option value="Cukup Berminat">Cukup Berminat</option>
                                        <option value="Tidak Berminat">Tidak Berminat</option>
                                    </select>

                                    <Label>Paskibra</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="paskibra[]"
                                        id="paskibra">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Sangat Berminat">Sangat Berminat</option>
                                        <option value="Berminat">Berminat</option>
                                        <option value="Cukup Berminat">Cukup Berminat</option>
                                        <option value="Tidak Berminat">Tidak Berminat</option>
                                    </select>

                                    <Label>Pramuka</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="pramuka[]"
                                        id="pramuka">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Sangat Berminat">Sangat Berminat</option>
                                        <option value="Berminat">Berminat</option>
                                        <option value="Cukup Berminat">Cukup Berminat</option>
                                        <option value="Tidak Berminat">Tidak Berminat</option>
                                    </select>
                                </div>

                                <div class="mt-4" id="step3-content">
                                    <p class="fw-bold">Kriteria Riwayat Mengikuti Ekskul</p>

                                    <Label>Futsal</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="futsal[]"
                                        id="futsal">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>

                                    <Label>Basket</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="basket[]"
                                        id="basket">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>

                                    <Label>Renang</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="renang[]"
                                        id="renang">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>

                                    <Label>Paskibra</Label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        name="paskibra[]" id="paskibra">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>

                                    <Label>Pramuka</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="pramuka[]"
                                        id="pramuka">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Pernah">Pernah</option>
                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                    </select>
                                </div>

                                <div class="mt-4" id="step4-content">
                                    <p class="fw-bold">Kriteria Prestasi</p>

                                    <Label>Futsal</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="futsal[]"
                                        id="futsal">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Ada Prestasi">Ada Prestasi</option>
                                        <option value="Tidak Ada Prestasi">Tidak Ada Prestasi</option>
                                    </select>

                                    <Label>Basket</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="basket[]"
                                        id="basket">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Ada Prestasi">Ada Prestasi</option>
                                        <option value="Tidak Ada Prestasi">Tidak Ada Prestasi</option>
                                    </select>

                                    <Label>Renang</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="renang[]"
                                        id="renang">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Ada Prestasi">Ada Prestasi</option>
                                        <option value="Tidak Ada Prestasi">Tidak Ada Prestasi</option>
                                    </select>

                                    <Label>Paskibra</Label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        name="paskibra[]" id="paskibra">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Ada Prestasi">Ada Prestasi</option>
                                        <option value="Tidak Ada Prestasi">Tidak Ada Prestasi</option>
                                    </select>

                                    <Label>Pramuka</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="pramuka[]"
                                        id="pramuka">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="Ada Prestasi">Ada Prestasi</option>
                                        <option value="Tidak Ada Prestasi">Tidak Ada Prestasi</option>
                                    </select>
                                </div>

                                <div class="mt-4 text-end">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        onclick="prevStep()">Kembali</button>
                                    <button type="button" class="btn btn-sm btn-success"
                                        onclick="nextStep()">Selanjutnya</button>
                                    <button type="submit" class="btn btn-sm btn-success"
                                        style="display: none;">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 4;

        function showStep(step) {
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById(`step${i}-content`).style.display = i === step ? 'block' : 'none';
                document.getElementById(`step${i}`).classList.toggle('bg-success', i <= step);
                document.getElementById(`step${i}`).classList.toggle('bg-secondary', i > step);
            }

            document.querySelector('.btn-secondary').style.display = step === 1 ? 'none' : 'inline-block';
            document.querySelector('.btn-success').style.display = step === totalSteps ? 'none' : 'inline-block';
            document.querySelector('button[type="submit"]').style.display = step === totalSteps ? 'inline-block' : 'none';
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        // Inisialisasi langkah pertama
        showStep(currentStep);
    </script>
@endsection
