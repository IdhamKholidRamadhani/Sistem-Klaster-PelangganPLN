@extends('layouts.template')
@section('title', 'Result_Data')
@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            @if (session('success'))
                <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        {{-- Tabel Result Category --}}
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-base font-bold">Tabel Hasil Klaster Data Pelanggan</h6>
                    @if (auth()->user()->role == 'dinsos')
                        <a href="/Data-Result/Tambah-Data-Baru" type="button"
                            class="ml-auto focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                            <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
                            Tambah Data
                        </a>
                    @endif
                    @if (auth()->user()->role == 'pln')
                        <a
                            class="invisible ml-auto focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                        </a>
                    @endif

                    <a type="button" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                        <i class="fa fa-download mr-2" aria-hidden="true"></i>
                        Cetak
                    </a>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-30">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="/Export-Excel" class="block px-4 py-2 hover:bg-gray-100">
                                    <i class="fa fa-file-excel-o mr-1" aria-hidden="true"></i>
                                    Excel</a>
                            </li>
                            <li>
                                <a href="/Export-PDF" class="block px-4 py-2 hover:bg-gray-100">
                                    <i class="fa fa-file-pdf-o mr-1" aria-hidden="true"></i>
                                    PDF</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="overflow-x-auto p-7">
                        <table id="data_result_all" class="cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-left text-sm whitespace-nowrap">
                                        No</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        ID Pel</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Nama</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Tarif</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Daya</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Alamat</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Pekerjaan</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Penghasilan</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Tgg</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        SKTM</th>
                                    <th class="font-bold text-left text-sm whitespace-nowrap">
                                        Kategori</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm capitalize">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function capitalizeFirstLetter(string) {
            var str = string.toLowerCase()
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
        $(function() {
            $('#data_result_all').DataTable({
                // processing: true,
                retrieve: true,
                serverSide: true,
                paginate: true,
                // searchDelay: 500,
                bDeferRender: true,
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                scrollX: true,
                pagingType: 'simple_numbers',
                // lengthMenu: [
                //     [5, 10, 25, 50, 100],
                //     [5, 10, 25, 50, 100]
                // ],
                ajax: "{{ route('Result') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'no_pelanggan_result',
                        name: 'no_pelanggan_result'
                    },
                    {
                        data: 'nama_pelanggan_result',
                        name: 'nama_pelanggan_result'
                    },
                    {
                        data: 'tarif_pelanggan_result',
                        name: 'tarif_pelanggan_result'
                    },
                    {
                        data: 'daya_pelanggan_result',
                        name: 'daya_pelanggan_result'
                    },
                    {
                        data: 'alamat_pelanggan_result',
                        name: 'alamat_pelanggan_result'
                    },
                    {
                        data: 'pekerjaan_pelanggan_result',
                        name: 'pekerjaan_pelanggan_result'
                    },
                    {
                        data: 'penghasilan_pelanggan_result',
                        render: $.fn.dataTable.render.number('.', '.', '', 'Rp. ')
                    },
                    {
                        data: 'tanggungan_pelanggan_result',
                        name: 'tanggungan_pelanggan_result'
                    },
                    {
                        data: 'sktm_pelanggan_result',
                        name: 'sktm_pelanggan_result'
                    },
                    {
                        data: 'kategori_result',
                        name: 'kategori_result'
                    },
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('.dataTables_filter input[type="search"]').css({
                border: 'none',
                padding: '5px',
            });
        });
    </script>

@endsection
