@extends('layouts.template')
@section('title', 'Static')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Jumlah Data</p>
                                <h5 class="mb-0 font-bold">
                                    {{ number_format($data->count()) }}
                                    <span
                                        class="ml-1 text-sm leading-normal font-weight-bolder text-lime-500">Penduduk</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="fa fa-users leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card2 -->
        {{-- <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Jumlah Desa</p>
                                <h5 class="mb-0 font-bold">
                                    2,300
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">+3%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="fa fa-address-book leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Subsidi</p>
                                <h5 class="mb-0 font-bold">
                                    {{ number_format($data->where('kategori_result', 'Subsidi')->count()) }}
                                    <span
                                        class="ml-1 text-sm leading-normal text-lime-500 font-weight-bolder">Penduduk</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="fa fa-user leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Non Subsidi</p>
                                <h5 class="mb-0 font-bold">
                                    {{ number_format($data->where('kategori_result', 'Non Subsidi')->count()) }}
                                    <span
                                        class="ml-1 text-sm leading-normal font-weight-bolder text-lime-500">Penduduk</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="fa fa-user leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="mt-6 border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
            <h6 class="font-sans text-sm font-semibold">Perbandingan Data Subsidi Setiap Desa</h6>
        </div>
        <div class="flex-auto p-4">
            <div>
                {{-- <canvas id="chart-line" height="300"></canvas> --}}
                <div id="chartJSContainer" width="600" height="400"></div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(document).ready(function() {
            $.get("{{ url('/Chart-Admin') }}", function(res) {
                console.log(res);
                var options = {
                    series: [
                        {
                            name: 'Non Susidi',
                            data: res.nonsubsidi
                        },
                        {
                            name: 'Subsidi',
                            data: res.subsidi
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 350,
                        stacked: true,
                    },
                    stroke: {
                        width: 1,
                        colors: ['#fff']
                    },
                    dataLabels: {
                        formatter: (val) => {
                            return val
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false
                        }
                    },
                    xaxis: {
                        categories: res.label
                    },
                    fill: {
                        opacity: 1
                    },
                    colors: ['#80c7fd', '#008FFB', '#80f1cb', '#00E396'],
                    yaxis: {
                        labels: {
                            formatter: (val) => {
                                return val
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chartJSContainer"), options);
                chart.render();
            });
        });
    </script>
@endsection
