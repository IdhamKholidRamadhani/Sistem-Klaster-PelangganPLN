@extends('layouts.template')
@section('title', 'Form_KNN')
@section('content')

    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="text-base font-bold">Tambah Data Pelanggan Baru</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="overflow-x-auto p-7">
                    <form>
                        <div class="mb-6">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900">ID Pelanggan</label>
                            <input type="" id=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan ID Pel" required>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Lengkap</label>
                                <input type="text" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan Nama Lengkap" required>
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Tarif</label>
                                <ul
                                    class="items-center w-full text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">R-1/TR</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <input type="text" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan Alamat" required>
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Daya
                                    Listrik</label>
                                <ul
                                    class="items-center w-full text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">450 VA</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">900 VA</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">1.300 VA</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">2.200 VA</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                                <input type="" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Jenis Pekerjaan" required>
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan (Per
                                    Bulan)</label>
                                <input type="" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Penghasilan" required>
                            </div>
                            <div>
                                <label for=""
                                    class="block mb-2 text-sm font-medium text-gray-900">Tanggungan</label>
                                <input type="" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Penghasilan" required>
                            </div>
                            <div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Surat
                                    Keterangan
                                    Tidak Mampu</label>
                                <ul
                                    class="items-center w-full text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
                                                class="w-full py-3 ml-2 text-xs text-gray-900">Ya</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" type="radio" value=""
                                                name="list-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="horizontal-list-radio-license"
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
