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
                <h1 class="text-gray-800 font-bold text-2xl mb-3">Registrasi</h1>
                {{-- <p class="text-sm font-normal text-gray-600 mb-7">Implementasi Data Mining Menentukan Kelompok Pelanggan
                    Listrik Subsidi</p> --}}

                @if (session('error'))
                    <div id="alert-1" class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Maaf,</span> {{ session('error') }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                            data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Username" required>
                    </div>
                    <div>
                        <label for="nama_kantor" class="block mb-2 text-sm font-medium text-gray-900">Nama
                            Instansi</label>
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
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Password" required>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation "
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
