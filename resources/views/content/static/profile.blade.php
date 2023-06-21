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

                        @if (session('success'))
                            <div id="alert-1" class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                                role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Done,</span> {{ session('success') }}
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
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

                        <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-3.5 py-1.5 rounded">Data
                            Instansi</span>

                        @foreach ($data as $d)
                            <form action="/Update-Profile/{{ $d->id }}" method="POST">
                                @csrf
                                <div class="grid gap-6 mb-6 mt-4 md:grid-cols-2">
                                    <div class="hidden">
                                        <label for="id"
                                            class="hidden block mb-2 text-sm font-medium text-gray-900">Id</label>
                                        <input type="hidden" name="id" id="id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $d->id }}">
                                    </div>
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900">Administrator</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $d->name }}">
                                    </div>
                                    <div>
                                        <label for="kontak"
                                            class="block mb-2 text-sm font-medium text-gray-900">Kontak</label>
                                        <input type="tel" name="kontak" id="kontak"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $d->kontak }}">
                                    </div>
                                    <div>
                                        <label for="nama_kantor" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                            Instansi</label>
                                        <textarea type="text" name="nama_kantor" id="nama_kantor" rows="2"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $d->nama_kantor }}">{{ $d->nama_kantor }}</textarea>
                                    </div>
                                    <div>
                                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                                            Kantor</label>
                                        <textarea type="text" name="alamat_kantor" id="alamat" rows="3"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $d->alamat }}">{{ $d->alamat_kantor }}</textarea>
                                    </div>
                                </div>

                                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-3.5 py-1.5 rounded">Data
                                    Akun</span>
                                <div class="mt-4 mb-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email
                                        address</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ $d->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="•••••••••">
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password"
                                        class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                        password</label>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="•••••••••">
                                </div>
                                <button type="submit"
                                    class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                <a href="/Dashboard" type="button"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Kembali</a>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
