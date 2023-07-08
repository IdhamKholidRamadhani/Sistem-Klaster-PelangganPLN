<aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-hidden rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-10 py-6 m-0 text-lg text-white whitespace-nowrap text-slate-700" href="/Dashboard">
            <img src="{{ asset('assets') }}/img/electric.png"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="/Dashboard" />
            <span class="text-gray-800 font-bold transition-all duration-200 ease-nav-brand">Subsidi Listrik</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-full overflow-auto h-full grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            @if (auth()->user()->role == 'dinsos')
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-sm text-gray-400 font-extralight leading-tight">Dashboard</h6>
                </li>
                <li class="mt-2 w-full">
                    <a class="{{ request()->is('Dashboard', 'Profile') ? 'shadow-soft-xl rounded-lg bg-gradient-to-tl from-purple-300 to-pink-100 font-semibold text-slate-700' : 'text-gray-800' }} py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/Dashboard">
                        <div
                            class="{{ request()->is('Dashboard', 'Profile') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-th-large {{ request()->is('Dashboard', 'Profile') ? 'text-white' : '' }}"
                                aria-hidden="true"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-sm text-gray-400 font-extralight leading-tight">Data Processing</h6>
                </li>
                <li class="mt-2 w-full">
                    <a class="{{ request()->is('Upload-Data-Raw') ? 'shadow-soft-xl rounded-lg bg-gradient-to-tl from-purple-300 to-pink-100 font-semibold text-slate-700' : 'text-gray-800' }} py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/Upload-Data-Raw">
                        <div
                            class="{{ request()->is('Upload-Data-Raw') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-cloud-upload {{ request()->is('Upload-Data-Raw') ? 'text-white' : '' }}"
                                aria-hidden="true"></i>
                        </div>
                        <span class="ml-1 duration-300 pointer-events-none ease-soft">Upload Data</span>
                    </a>
                </li>

                <li class="w-full">
                    <a class="{{ request()->is('Table-Raw') ? 'shadow-soft-xl rounded-lg bg-gradient-to-tl from-purple-300 to-pink-100 font-semibold text-slate-700' : 'text-gray-800' }} py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/Table-Raw">
                        <div
                            class="{{ request()->is('Table-Raw') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-sitemap {{ request()->is('Table-Raw') ? 'text-white' : '' }}"
                                aria-hidden="true"></i>
                        </div>
                        <span class="ml-1 duration-300 pointer-events-none ease-soft">Pengelompokan Data</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-sm font-extralight text-gray-400 leading-tight">Output</h6>
                </li>
                <li class="mt-2 w-full">
                    <a class="{{ request()->is('Data-Result', 'Data-Result/Tambah-Data-Baru') ? 'shadow-soft-xl rounded-lg bg-gradient-to-tl from-purple-300 to-pink-100 font-semibold text-slate-700' : 'text-gray-800' }} py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/Data-Result">
                        <div
                            class="{{ request()->is('Data-Result', 'Data-Result/Tambah-Data-Baru') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-file-text {{ request()->is('Data-Result', 'Data-Result/Tambah-Data-Baru') ? 'text-white' : '' }}"
                                aria-hidden="true"></i>
                        </div>
                        <span class="ml-1 duration-300 pointer-events-none ease-soft">Hasil</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == 'pln')
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-sm text-gray-400 font-extralight leading-tight">Dashboard</h6>
                </li>
                <li class="mt-2 w-full">
                    <a class="{{ request()->is('Dashboard', 'Profile') ? 'shadow-soft-xl rounded-lg bg-gradient-to-tl from-purple-300 to-pink-100 font-semibold text-slate-700' : 'text-gray-800' }} py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/Dashboard">
                        <div
                            class="{{ request()->is('Dashboard', 'Profile') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-th-large {{ request()->is('Dashboard', 'Profile') ? 'text-white' : '' }}"
                                aria-hidden="true"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-sm font-extralight text-gray-400 leading-tight">Output</h6>
                </li>
                <li class="mt-2 w-full">
                    <a class="{{ request()->is('Data-Result', 'Data-Result/Tambah-Data-Baru') ? 'shadow-soft-xl rounded-lg bg-gradient-to-tl from-purple-300 to-pink-100 font-semibold text-slate-700' : 'text-gray-800' }} py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/Data-Result">
                        <div
                            class="{{ request()->is('Data-Result', 'Data-Result/Tambah-Data-Baru') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-file-text {{ request()->is('Data-Result', 'Data-Result/Tambah-Data-Baru') ? 'text-white' : '' }}"
                                aria-hidden="true"></i>
                        </div>
                        <span class="ml-1 duration-300 pointer-events-none ease-soft">Hasil</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>
