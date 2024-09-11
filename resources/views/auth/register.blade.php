<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nis -->
        <div>
            <x-input-label for="nis" :value="__('NIS')" />
            <x-text-input id="nis" class="block mt-1 w-full" type="number" name="nis" :value="old('nis')" required
                autofocus autocomplete="nis" />
            <x-input-error :messages="$errors->get('nis')" class="mt-2" />
        </div>

        <!-- Nama -->
        <div class="mt-4">
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"
                required autofocus autocomplete="nama" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Username -->
        {{-- <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Jenjang -->
        <div class="mt-4">
            <x-input-label for="jenjang" :value="__('Jenjang')" />

            <select id="jenjang" name="jenjang"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected hidden>--- Pilih Jenjang Pendidikan ---</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
            </select>
        </div>

        <!-- kelas -->
        <div class="mt-4">
            <x-input-label for="kelas" :value="__('Kelas')" />
            <x-text-input id="kelas" class="block mt-1 w-full" type="number" name="kelas" :value="10"
                required autofocus autocomplete="kelas" readonly />
            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
        </div>

        <!-- Jurusan -->
        <div class="mt-4">
            <x-input-label for="jurusan" :value="__('Jurusan')" />

            <select id="jurusan" name="jurusan"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected hidden>--- Pilih Jurusan ---</option>
                <option value="IPA">IPA</option>
                <option value="IPS">IPS</option>
                <option value="TKJ">TKJ</option>
                <option value="TSM">TSM</option>
            </select>
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jk" :value="__('Jenis Kelamin')" />

            <select id="jk" name="gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected hidden>--- Pilih Jenis Kelamin ---</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />

            <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Sudah Punya Akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // Sembunyikan jurusan saat halaman pertama kali dimuat
        document.getElementById('jurusan').parentElement.style.display = 'none';

        document.getElementById('jenjang').addEventListener('change', function() {
            const jurusanSelect = document.getElementById('jurusan');
            const jurusanDiv = jurusanSelect.parentElement;

            // Jika user sudah memilih jenjang, tampilkan jurusan
            if (this.value === 'SMA' || this.value === 'SMK') {
                jurusanDiv.style.display = 'block';
                // Hapus semua opsi yang ada
                jurusanSelect.innerHTML = '<option selected hidden>--- Pilih Jurusan ---</option>';

                // Tambahkan opsi berdasarkan pilihan jenjang
                if (this.value === 'SMA') {
                    jurusanSelect.innerHTML += '<option value="IPA">IPA</option>';
                    jurusanSelect.innerHTML += '<option value="IPS">IPS</option>';
                } else if (this.value === 'SMK') {
                    jurusanSelect.innerHTML += '<option value="TKJ">TKJ</option>';
                    jurusanSelect.innerHTML += '<option value="TSM">TSM</option>';
                }
            } else {
                // Jika belum memilih jenjang atau reset, sembunyikan kembali jurusan
                jurusanDiv.style.display = 'none';
            }
        });
    </script>

</x-guest-layout>
