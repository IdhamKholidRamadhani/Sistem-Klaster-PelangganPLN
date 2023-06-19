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
</head>

<body>

    <header class="text-gray-400 bg-gray-900 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
                <img src="{{ asset('assets') }}/img/electric.png" class="w-10 h-10" alt="">
                <span class="ml-3 text-xl">Cek Penerimaan Subsidi Listrik</span>
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700	flex flex-wrap items-center text-base justify-center">
                <p>Implementasi Data Mining Menentukan Kelompok Pelanggan Listrik Subsidi Atau Non Subsidi</p>
            </nav>
        </div>
    </header>

    <section
        class="text-gray-400 bg-[url('{{ asset('assets') }}/img/pln2.png')] body-font bg-no-repeat bg-cover bg-center">
        <div class="container mx-auto flex flex-col px-5 py-24 justify-center items-center">
            <div class="w-full md:w-2/3 flex flex-col mb-16 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Cek Penerimaan Subsidi Listrik
                </h1>
                <p class="mb-8 leading-relaxed text-white">Pelanggan yang memperoleh bantuan dari pemerintah masuk dalam
                    kategori pelanggan subsidi, sedangkan di luar itu merupakan pelanggan nonsubsidi. Sesuai dengan
                    Pasal 2 ayat 1 Peraturan Menteri ESDM Nomor 29 Tahun 2016, bantuan subsidi tarif listrik untuk rumah
                    tangga melalui PLN diberikan kepada pelanggan rumah tangga dengan daya 450 volt ampere (VA) dan 900
                    VA yang termasuk dalam masyarakat prasejahtera serta sudah dalam Data Terpadu Kesejahteraan Sosial
                    (DTKS).
                </p>
                <div class="flex w-full justify-center items-end">
                    <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4 md:w-full text-left">
                        <label for="hero-field" class="leading-7 text-sm text-gray-400">Cek ID Pel</label>
                        <input type="text" id="hero-field" name="hero-field"
                            class="w-full bg-gray-800 rounded border bg-opacity-40 border-gray-700 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    {{-- <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="block inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Cari
                        ID Pel
                    </button> --}}
                    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="block inline-flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-lg px-6 py-2 text-center"
                        type="button">
                        Cari ID Pel
                    </button>
                </div>

                <!-- Main modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Data ID Pelanggan
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                    data-modal-hide="defaultModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-500">
                                    With less than a month to go before the European Union enacts new consumer privacy
                                    laws for its citizens, companies around the world are updating their terms of
                                    service agreements to comply.
                                </p>
                            </div>
                        </div>
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
