@extends('layouts.template')
@section('title', 'Upload')
@section('content')

    <div class="flex flex-wrap -mx-3">
        {{-- Tabel Raw --}}
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

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-base font-bold">Tabel Data Pelanggan (Raw)</h6>
                    <button type="button" onclick="DataResult()"
                        class="ml-auto focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Proses
                        Klaster</button>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="overflow-x-auto p-7">
                        <table id="dataRaw" class="cell-border" style="width:100%">
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
                                </tr>
                            </thead>
                            <tbody class="text-sm capitalize">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tabel Result --}}
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-base font-bold">Tabel Data Pelanggan (Results)</h6>
                    <div class="ml-auto">
                        <form action="/Data-From-Raw" method="POST">
                            @csrf
                            <input type="hidden" name="acceptToSaveData" value="acceptToSaveData">
                            <button type="submit"
                            class="ml-auto focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="overflow-x-auto p-7">
                        <table id="dataResult" class="cell-border" style="width:100%">
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
            $('#dataRaw').DataTable({
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
                ajax: "{{ route('Data-Raw') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'no_pelanggan_raw',
                        name: 'no_pelanggan_raw'
                    },
                    {
                        data: 'nama_pelanggan_raw',
                        name: 'nama_pelanggan_raw'
                    },
                    {
                        data: 'tarif_pelanggan_raw',
                        name: 'tarif_pelanggan_raw'
                    },
                    {
                        data: 'daya_pelanggan_raw',
                        name: 'daya_pelanggan_raw'
                    },
                    {
                        data: 'alamat_pelanggan_raw',
                        name: 'alamat_pelanggan_raw'
                    },
                    {
                        data: 'pekerjaan_pelanggan_raw',
                        name: 'pekerjaan_pelanggan_raw'
                    },
                    {
                        data: 'penghasilan_pelanggan_raw',
                        render: $.fn.dataTable.render.number('.', '.', '', 'Rp. ')
                    },
                    {
                        data: 'tanggungan_pelanggan_raw',
                        name: 'tanggungan_pelanggan_raw'
                    },
                    {
                        data: 'sktm_pelanggan_raw',
                        name: 'sktm_pelanggan_raw'
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

    <script type="text/javascript">
        function DataResult() {
            $('#dataResult').DataTable({
                // processing: true,
                retrieve: true,
                serverSide: true,
                paginate: true,
                searchDelay: 500,
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
                ajax: "{{ route('Hasil-Klaster') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'no_pelanggan_raw',
                        name: 'no_pelanggan_raw'
                    },
                    {
                        data: 'nama_pelanggan_raw',
                        name: 'nama_pelanggan_raw'
                    },
                    {
                        data: 'tarif_pelanggan_raw',
                        name: 'tarif_pelanggan_raw'
                    },
                    {
                        data: 'daya_pelanggan_raw',
                        name: 'daya_pelanggan_raw'
                    },
                    {
                        data: 'alamat_pelanggan_raw',
                        name: 'alamat_pelanggan_raw'
                    },
                    {
                        data: 'pekerjaan_pelanggan_raw',
                        name: 'pekerjaan_pelanggan_raw'
                    },
                    {
                        data: 'penghasilan_pelanggan_raw',
                        render: $.fn.dataTable.render.number('.', '.', '', 'Rp. ')
                    },
                    {
                        data: 'tanggungan_pelanggan_raw',
                        name: 'tanggungan_pelanggan_raw'
                    },
                    {
                        data: 'sktm_pelanggan_raw',
                        name: 'sktm_pelanggan_raw'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('.dataTables_filter input[type="search"]').css({
                border: 'none',
                padding: '5px',
            });
        }
    </script>
@endsection
