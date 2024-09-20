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

                            <form action="{{route('pemilihan-ekskul.smart')}}" method="POST">
                                @csrf
                                <div class="mt-4" id="step1-content">
                                    <p class="fw-bold">Kriteria Umum</p>

                                    <x-admin.input type="text" label="NIS Siswa" name="nis" readonly="true"
                                        value="{{ $siswa->nis ?? '' }}" />
                                    <x-admin.input type="text" label="Nama Siswa" name="nama" readonly="true"
                                        value="{{ $siswa->nama ?? '' }}" />

                                    <Label>Tinggi Badan</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="tinggi"
                                        id="tinggi">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="1">< 151 - 160</option>
                                        <option value="2">< 161 - 170</option>
                                        <option value="3">> 170</option>
                                    </select>

                                    <Label>Berat Badan</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="berat"
                                        id="berat">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="1">< 40 - 45</option>
                                        <option value="2"> 46 - 50</option>
                                        <option value="3">> 51 - 70</option>
                                    </select>

                                    <Label>Riwayat Penyakit</Label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="riwayat"
                                        id="riwayat">
                                        <option selected hidden>--- Pilih ---</option>
                                        <option value="1">Ada Riwayat</option>
                                        <option value="2">Tidak Ada Riwayat</option>
                                    </select>
                                </div>

                                <div class="mt-4" id="step2-content">
                                    <p class="fw-bold">Kriteria Minat</p>

                                    @foreach ($ekskul as $item)
                                        <Label>{{ $item->nama_ekskul ?? '' }}</Label>
                                        <select class="form-select mb-3" aria-label="Default select example"
                                            name="minat{{ $item->nama_ekskul ?? '' }}"
                                            id="minat{{ $item->nama_ekskul ?? '' }}">
                                            <option selected hidden>--- Pilih ---</option>
                                            <option value="1">Tidak Berminat</option>
                                            <option value="2">Cukup Berminat</option>
                                            <option value="3">Sangat Berminat</option>
                                        </select>
                                    @endforeach
                                </div>

                                <div class="mt-4" id="step3-content">
                                    <p class="fw-bold">Kriteria Riwayat Mengikuti Ekskul</p>

                                    @foreach ($ekskul as $item)
                                        <Label>{{ $item->nama_ekskul ?? '' }}</Label>
                                        <select class="form-select mb-3" aria-label="Default select example"
                                            name="riwayat{{ $item->nama_ekskul ?? '' }}"
                                            id="riwayat{{ $item->nama_ekskul ?? '' }}">
                                            <option selected hidden>--- Pilih ---</option>
                                            <option value="1">Tidak Pernah</option>
                                            <option value="2">Pernah</option>
                                        </select>
                                    @endforeach


                                </div>

                                <div class="mt-4" id="step4-content">
                                    <p class="fw-bold">Kriteria Prestasi</p>

                                    @foreach ($ekskul as $item)
                                        <Label>{{ $item->nama_ekskul ?? '' }}</Label>
                                        <select class="form-select mb-3" aria-label="Default select example"
                                            name="prestasi{{ $item->nama_ekskul ?? '' }}"
                                            id="prestasi{{ $item->nama_ekskul ?? '' }}">
                                            <option selected hidden>--- Pilih ---</option>
                                            <option value="1">Tidak Ada Prestasi</option>
                                            <option value="2">Ada Prestasi</option>
                                        </select>
                                    @endforeach

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
