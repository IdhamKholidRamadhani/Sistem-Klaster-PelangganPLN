<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Implementasi Data Mining Menentukan Kelompok Pelanggan Listrik Subsidi Atau Non Subsidi</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/electric.png" />
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/electric.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!-- component -->
    <div class="h-screen md:flex p-10">
        <div class="relative overflow-hidden md:flex w-1/2 bg-white i justify-around items-center hidden">
            <img src="{{ asset('assets') }}/img/bg-electric.png" alt="" srcset="" class="absolute w-full">
        </div>
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            <form class="bg-white" action="/ActionRegister" method="POST">
                @csrf
                {{-- <img src="{{ asset('assets') }}/img/electric.png" alt="logo" width="100px" height="100px"
                    class="mb-3"> --}}
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Registrasi</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Implementasi Data Mining Menentukan Kelompok Pelanggan
                    Listrik Subsidi</p>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Username" required>
                    </div>
                    <div>
                        <label for="nama_kantor" class="block mb-2 text-sm font-medium text-gray-900">Nama Instansi</label>
                        <input type="text" name="nama_kantor" id="nama_kantor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Nama Instansi" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="alamat_kantor" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                        Instansi</label>
                    <textarea type="text" name="alamat_kantor" id="alamat_kantor" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Alamat Instansi" required></textarea>
                </div>
                <div class="mb-2">
                    <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900">Kontak (No Telp)</label>
                    <input type="text" name="kontak" id="kontak"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="No. Telp" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="text" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Email" required>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="text" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Password" required>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            Password</label>
                        <input type="text" name="password_confirmation" id="password_confirmation "
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Confirm Password" required>
                    </div>
                </div>

                <button type="submit"
                    class="block w-full bg-gradient-to-tl from-purple-700 to-pink-500 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
