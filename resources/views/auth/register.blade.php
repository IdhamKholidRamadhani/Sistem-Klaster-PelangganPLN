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
            <form class="bg-white" action="/Send-Register" method="post">
                @csrf
                <img src="{{ asset('assets') }}/img/electric.png" alt="logo" width="130px" height="130px"
                    class="mb-3">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Registrasi</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Implementasi Data Mining Menentukan Kelompok Pelanggan
                    Listrik Subsidi</p>
                    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-person h-5 w-5 text-gray-400" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="name" id="name"
                        placeholder="Username" required />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-person h-5 w-5 text-gray-400" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="email" id="email"
                        placeholder="Email Address" required/>
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-person-lock h-5 w-5 text-gray-400" viewBox="0 0 16 16">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="password" name="password" id="password"
                        placeholder="Password" required />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-person-lock h-5 w-5 text-gray-400" viewBox="0 0 16 16">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm Password" required />
                </div>
                <button type="submit"
                    class="block w-full bg-gradient-to-tl from-purple-700 to-pink-500 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
