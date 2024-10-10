@extends('admin.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Siswa Ekskul</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-end">
                        <a href="#" class="btn bg-gradient-success"><i class="bi bi-plus-circle"></i><span
                                class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body pb-5 px-5">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Renang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pramuka</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Futsal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Basket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paskibra</a>
                            </li>
                        </ul>
                        <div class="table-responsive p-0">
                            <div id="renang-content">
                                <table class="my-3 text-dark text-sm">
                                    <tr>
                                        <td>
                                            Nama Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            Hartono
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No HP Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            08726534512
                                        </td>
                                    </tr>
                                </table>

                                <x-admin.table id="ekskul1">
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

                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Rina</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Roni</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Ria</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                </x-admin.table>
                            </div>

                            <div id="pramuka-content">
                                <table class="my-3 text-dark text-sm">
                                    <tr>
                                        <td>
                                            Nama Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            Budiono
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No HP Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            08726534512
                                        </td>
                                    </tr>
                                </table>

                                <x-admin.table id="ekskul2">
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

                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Budi</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Boke</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Toli</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                </x-admin.table>
                            </div>

                            <div id="futsal-content">
                                <table class="my-3 text-dark text-sm">
                                    <tr>
                                        <td>
                                            Nama Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            Gokidu
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No HP Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            08726534512
                                        </td>
                                    </tr>
                                </table>

                                <x-admin.table id="ekskul3">
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

                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Budi</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Boke</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Toli</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                </x-admin.table>
                            </div>

                            <div id="basket-content">
                                <table class="my-3 text-dark text-sm">
                                    <tr>
                                        <td>
                                            Nama Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            Fadli
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No HP Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            08726534512
                                        </td>
                                    </tr>
                                </table>

                                <x-admin.table id="ekskul4">
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

                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Budi</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Boke</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Toli</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                </x-admin.table>
                            </div>

                            <div id="paskibra-content">
                                <table class="my-3 text-dark text-sm">
                                    <tr>
                                        <td>
                                            Nama Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            Judi
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No HP Pelatih
                                        </td>
                                        <td class="px-2">
                                            :
                                        </td>
                                        <td>
                                            08726534512
                                        </td>
                                    </tr>
                                </table>

                                <x-admin.table id="ekskul5">
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

                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Budi</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Boke</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                    <tr>
                                        <x-admin.td class="text-center">1</x-admin.td>
                                        <x-admin.td class="text-center">2000</x-admin.td>
                                        <x-admin.td class="text-center">Toli</x-admin.td>
                                        <x-admin.td class="text-center">Pria</x-admin.td>
                                        <x-admin.td class="text-center">11</x-admin.td>
                                        <x-admin.td class="text-center">SMA</x-admin.td>
                                    </tr>
                                </x-admin.table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen tab
            const tabs = document.querySelectorAll('.nav-tabs .nav-link');
            const contents = {
                'Renang': document.getElementById('renang-content'),
                'Pramuka': document.getElementById('pramuka-content'),
                'Futsal': document.getElementById('futsal-content'),
                'Basket': document.getElementById('basket-content'),
                'Paskibra': document.getElementById('paskibra-content')
            };

            // Fungsi untuk menampilkan konten yang sesuai dengan tab yang aktif
            function showContent(tabName) {
                for (const contentKey in contents) {
                    if (contentKey === tabName) {
                        contents[contentKey].style.display = 'block';
                    } else {
                        contents[contentKey].style.display = 'none';
                    }
                }
            }

            // Pasang event listener pada setiap tab
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Hilangkan kelas 'active' dari semua tab di dalam nav-tabs
                    tabs.forEach(tab => tab.classList.remove('active'));

                    // Tambahkan kelas 'active' pada tab yang diklik
                    this.classList.add('active');

                    // Tampilkan konten yang sesuai
                    showContent(this.textContent);
                });
            });

            // Tampilkan konten pertama kali sesuai tab yang aktif saat halaman dimuat
            const activeTab = document.querySelector('.nav-tabs .nav-link.active');
            if (activeTab) {
                showContent(activeTab.textContent);
            } else {
                // Jika tidak ada tab yang aktif, aktifkan tab pertama dan tampilkan kontennya
                tabs[0].classList.add('active');
                showContent(tabs[0].textContent);
            }
        });
    </script>
@endsection
