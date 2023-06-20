@extends('layouts.template')
@section('title', 'Profile')
@section('content')

    <div class="flex flex-wrap -mx-3">
        {{-- Tabel Raw --}}
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-base font-bold">Profil Information</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="overflow-x-auto p-7">

                        <h3 class="text-base mb-3">Data Instansi</h3>
                        <form>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900">Administrator</label>
                                    <input type="text" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ Auth::user()->name }}" required>
                                </div>
                                <div>
                                    <label for="no_telp"
                                        class="block mb-2 text-sm font-medium text-gray-900">Kontak</label>
                                    <input type="tel" id="no_telp"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ Auth::user()->kontak }}" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                <div>
                                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Instansi</label>
                                    <textarea type="text" id="nama_kantor" rows="2"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ Auth::user()->nama_kantor }}" required>{{ Auth::user()->nama_kantor }}</textarea>
                                </div>
                                <div>
                                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                                        Kantor</label>
                                    <textarea type="text" id="alamat" rows="3"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ Auth::user()->alamat }}" required>{{ Auth::user()->alamat_kantor }}</textarea>
                                </div>
                            </div>

                            {{-- <h3 class="text-base mt-6 mb-3">Data Akun</h3> --}}
                            <span class="mt-6 mb-3 bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Data Akun</span>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email
                                    address</label>
                                <input type="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="•••••••••" required>
                            </div>
                            <div class="mb-6">
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                    password</label>
                                <input type="password" id="confirm_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="•••••••••" required>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <a href="/Dashboard" type="button"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Kembali</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
