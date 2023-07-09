@extends('layouts.template')
@section('title', 'Hasil Processing')
@section('title2', 'Tambah Data')
@section('title3', 'Tambah Data')
@section('content')

    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="text-base font-bold">Tambah Data Pelanggan Baru</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="overflow-x-auto p-7">
                    <form method="post" action="/Proses-Prediksi">
                        @csrf
                        <div class="mb-6">
                            <label for="no_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">ID Pelanggan</label>
                            <input type="text" id="no_pelanggan_result" name="no_pelanggan_result"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan ID Pel" required>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nama_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Lengkap</label>
                                <input type="text" id="nama_pelanggan_result" name="nama_pelanggan_result"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan Nama Lengkap" required>
                            </div>
                            <div>
                                <label for="tarif_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Tarif</label>
                                <ul
                                    class="items-center w-full text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="tarif_pelanggan_result" type="radio" value="R-1/TR"
                                                name="tarif_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="tarif_pelanggan_result"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">R-1/TR</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <label for="alamat_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <input type="text" id="alamat_pelanggan_result" name="alamat_pelanggan_result"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan Alamat" required>
                            </div>
                            <div>
                                <label for="daya_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Daya
                                    Listrik</label>
                                <ul
                                    class="items-center w-full text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="daya_pelanggan_result_450" type="radio" value="450"
                                                name="daya_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="daya_pelanggan_result_450"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">450 VA</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="daya_pelanggan_result_900" type="radio" value="900"
                                                name="daya_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="daya_pelanggan_result_900"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">900 VA</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="daya_pelanggan_result_1300" type="radio" value="1300"
                                                name="daya_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="daya_pelanggan_result_1300"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">1.300 VA</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="daya_pelanggan_result_2200" type="radio" value="2200"
                                                name="daya_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="daya_pelanggan_result_2200"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">2.200 VA</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <label for="pekerjaan_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                                <input type="text" id="pekerjaan_pelanggan_result" name="pekerjaan_pelanggan_result"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Jenis Pekerjaan" required>
                            </div>
                            <div>
                                <label for="penghasilan_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan (Per
                                    Bulan)</label>
                                <input type="text" id="penghasilan_pelanggan_result" name="penghasilan_pelanggan_result"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Penghasilan" required>
                            </div>
                            <div>
                                <label for="tanggungan_pelanggan_result"
                                    class="block mb-2 text-sm font-medium text-gray-900">Tanggungan</label>
                                <input type="text" id="tanggungan_pelanggan_result" name="tanggungan_pelanggan_result"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Penghasilan" required>
                            </div>
                            <div>
                                <label for="sktm_pelanggan_result" class="block mb-2 text-sm font-medium text-gray-900">Surat
                                    Keterangan
                                    Tidak Mampu</label>
                                <ul
                                    class="items-center w-full text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="sktm_pelanggan_result_1" type="radio" value="1"
                                                name="sktm_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="sktm_pelanggan_result_1"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">Ya</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="sktm_pelanggan_result_0" type="radio" value="0"
                                                name="sktm_pelanggan_result"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="sktm_pelanggan_result_0"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">Tidak</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                        <a href="/Data-Result" type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
