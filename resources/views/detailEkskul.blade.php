<!DOCTYPE html>
<html>

<title>SPK Ekskul</title>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('dist/assets/img/logo.png') }}">
</head>

<body class="bg-[#EBF4F6]">
    <div class="h-full bg-gradient-to-r from-[#402E7A] to-[#4C3BCF] rounded-b-[100px] shadow-xl">
        {{-- Navbar --}}
        <nav class="bg-gradient-to-r from-[#402E7A] to-[#4C3BCF] fixed top-0 z-10 w-full border-gray-200">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('dist/assets/img/logo.png') }}" class="h-12" alt="Logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                        <li>
                            <a href="{{ route('welcome') }}"
                                class="text-xs block py-2 px-3 text-white hover:text-[#3DC2EC] bg-blue-700 rounded md:bg-transparent md:p-0"
                                aria-current="page">HOME</a>
                        </li>
                        <li>
                            <a href="{{ route('welcome') }}"
                                class="text-xs block py-2 px-3 text-white hover:text-[#3DC2EC] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">ABOUT</a>
                        </li>
                        <li>
                            <a href="{{ route('welcome') }}"
                                class="text-xs block py-2 px-3 text-white hover:text-[#3DC2EC] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">EKSTRAKURIKULER</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="container mx-auto my-20">
        <!-- futsal -->
        <section id="ekskul" class="grid grid-cols-1">
            <div class="py-8">
                <p class="text-3xl font-bold text-[#4C3BCF]">
                    EKSTRAKURIKULER FUTSAL
                </p>
                <p class="text-slate-500 mt-2">
                    Ekstrakurikuler futsal adalah kegiatan ekstrakurikuler di sekolah yang menawarkan kesempatan
                    bagi siswa untuk belajar dan mengembangkan keterampilan dalam bermain futsal.
                </p>
            </div>
            <div class="overflow-hidden" data-aos="fade-up" data-aos-duration="1200">
                <img src="{{ asset('dist/assets/img/futsal.jpg') }}" alt=""
                    class="object-cover rounded-3xl max-h-[600px] w-full" />
            </div>
        </section>

        <!-- prestasi -->
        <section id="prestasi" class="mt-32">
            <p class="text-3xl font-bold text-[#4C3BCF]">PRESTASI EKSTRAKURIKULER FUTSAL</p>
            <p class="text-slate-500">
                Berikut Adalah Prestasi Ekstrakurikuler Futsal
                Yayasan Pendidikan Singosari Delitua.
            </p>

            <div class="mx-5">
                <ul class="list-decimal">
                    <li>Juara I Futsal memperebutkan piala Yanara tahun 2017</li>
                    <li>Juara I Futsal Open tournament Futsal Delitua 2017</li>
                    <li>Juara I Futsal tingkat SMP se kota medan COPI SU II tahun 2013</li>
                </ul>
            </div>
        </section>

        <!-- dokumentasi -->
        <section id="dokumentasi" class="mt-32">
            <p class="text-center text-3xl font-bold text-[#4C3BCF]">DOKUMENTASI EKSTRAKURIKULER FUTSAL</p>
            <p class="text-center text-orange-500">
                Berikut Adalah Dokumentasi Tentang Ekstrakurikuler Futsal
                Yayasan Pendidikan Singosari Delitua.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-1 mt-5 justify-items-center">
                <img src="{{ asset('dist/assets/img/ekskul.jpg') }}" alt=""
                    class="object-cover shadow-lg rounded-xl h-[250px] w-full" data-aos="fade-up"
                    data-aos-duration="1000" />
                <video class="object-cover shadow-lg rounded-xl h-[250px] w-full" controls data-aos="fade-up"
                    data-aos-duration="1100">
                    <source src="{{ asset('dist/assets/img/video.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <img src="{{ asset('dist/assets/img/basket.jpg') }}" alt=""
                    class="object-cover shadow-lg rounded-xl h-[250px] w-full" data-aos="fade-up"
                    data-aos-duration="1200" />
                <img src="{{ asset('dist/assets/img/renang.jpg') }}" alt=""
                    class="object-cover shadow-lg rounded-xl h-[250px] w-full" data-aos="fade-up"
                    data-aos-duration="1300" />
                <img src="{{ asset('dist/assets/img/paskibra.jpg') }}" alt=""
                    class="object-cover shadow-lg rounded-xl h-[250px] w-full" data-aos="fade-up"
                    data-aos-duration="1400" />
                <img src="{{ asset('dist/assets/img/pramuka.jpg') }}" alt=""
                    class="object-cover shadow-lg rounded-xl h-[250px] w-full" data-aos="fade-up"
                    data-aos-duration="1500" />
            </div>
        </section>
    </main>

    <footer class="bg-gradient-to-r from-[#402E7A] to-[#4C3BCF] rounded-t-[100px] shadow-xl">
        <p class="text-center text-white py-2">
            Copyright Reynald Sitepu 2024 All right reserved
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
