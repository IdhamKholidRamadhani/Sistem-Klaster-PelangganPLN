<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <title>Implementasi Data Mining Menentukan Kelompok Pelanggan Listrik Subsidi Atau Non Subsidi</title>
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/electric.png" />
</head>

<body>

    <header class="text-gray-400 bg-gray-900 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
                <img src="{{ asset('assets') }}/img/electric.png" class="w-10 h-10" alt="">
                <span class="ml-3 text-xl">Cek Penerimaan Subsidi Listrik</span>
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700 flex flex-wrap items-center text-base justify-center">
                <p>Implementasi Data Mining Menentukan Kelompok Pelanggan Listrik Subsidi Atau Non Subsidi</p>
            </nav>
        </div>
    </header>

    <section
        class="text-gray-400 bg-[url('{{ asset('assets') }}/img/pln2.png')] body-font bg-no-repeat bg-cover bg-center">
        <div class="container mx-auto flex flex-col px-5 pt-24 pb-24 justify-center items-center">
            <div class="w-full md:w-2/3 flex flex-col mb-16 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Cek Penerimaan Subsidi Listrik
                </h1>
                <p class="mb-8 leading-relaxed text-white">Pelanggan yang memperoleh bantuan dari pemerintah masuk dalam
                    kategori pelanggan subsidi, sedangkan di luar itu merupakan pelanggan nonsubsidi.
                </p>
                <div class="flex w-full justify-center items-end">
                    <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4 md:w-full text-left">
                        <form action="/Cari" method="post">
                            <label for="search" class="leading-7 text-sm text-gray-400">Cek ID Pel</label>
                            <input type="text" id="search" name="search"
                                class="w-full bg-gray-800 rounded border bg-opacity-40 border-gray-700 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </form>
                    </div>
                    <button id="defaultModal"
                        class="block inline-flex font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-lg px-6 py-2 text-center"
                        type="button">
                        Cari
                    </button>
                </div>

                <div id="modal" class="hidden w-full bg-white border border-gray-200 rounded-lg shadow mt-8">
                    <div class="p-4 bg-white rounded-lg md:p-8">
                        <h5 class="mb-3 text-xl font-extrabold tracking-tight text-gray-900">
                            ID Pelanggan</h5>
                        <p class="mb-3 text-gray-500">
                            {{-- @foreach ($data as $d)
                                {{ $d->nama_pelanggan_result }}.
                            @endforeach --}}
                        </p>
                        <button type="button" id="close"
                            class="py-2.5 px-5 mr-2 text-sm text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                            Tutup
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-14 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Subsidi listrik adalah bentuk bantuan dari
                    pemerintah untuk masyarakat agar bisa membayar tarif listrik lebih murah dari tarif kehidupan
                    ekonominya. Berdasarkan situs PT PLN Persero, pemerintah berkomitmen untuk memberikan pelayanan
                    listrik yang bisa dijangkau oleh segala kalangan masyarakat Indonesia. Maka dari itu, sesuai dengan
                    Undang-Undang (UU) Nomor 30 Tahun 2007 tentang Energi yang menyebutkan bahwa, pemerintah dan
                    pemerintah Daerah menyediakan dana subsidi untuk kelompok masyarakat tidak mampu.
                </p>
            </div>
            <div class="flex flex-wrap -m-4 text-center justify-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <button
                        class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
                        <img src="{{ asset('assets') }}/img/logo_Kebumen.png" class="w-25 h-36" alt="">
                    </button>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <button
                        class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
                        <img src="{{ asset('assets') }}/img/logo_listrikpintar2.png" class="w-25 h-36" alt="">
                    </button>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <button
                        class="bg-gray-100 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
                        <img src="{{ asset('assets') }}/img/logo_PLN.png" class="w-25 h-36" alt="">
                    </button>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
                <img src="{{ asset('assets') }}/img/electric.png" class="w-10 h-10" alt="">
                <span class="ml-3 text-xl">Cek Penerimaan Subsidi Listrik</span>
            </a>
            <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">©
                2023 —
            <p class="text-sm ml-1">Implementasi Data Mining Menentukan Kelompok Pelanggan Listrik Subsidi Atau Non
                Subsidi</p>
            </p>
        </div>
    </footer>
</body>

</html>

<script>
    var modal = document.getElementById("modal");
    var btn = document.getElementById("defaultModal");
    var close = document.getElementById("close");

    btn.onclick = function() {
        modal.style.display = "block";
    }

    close.onclick = function() {
        modal.style.display = "none";
    }
</script>
