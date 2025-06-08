@extends('admin.layouts.app')

@section('title', 'Manajemen Penilaian - Data Penilaian')

@section('customJs')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        const chartData = @json($hitungRekapPenilaian);

        $(document).ready(function() {
            // Loop melalui semua elemen dengan class .chart-level-bidang
            $('.chart-level-bidang').each(function(index, element) {
                // Ambil data yang ada pada atribut data-data
                const chartData = JSON.parse($(element).attr('data-data'));
                const chartId = $(element).attr('data-id');

                // Mapping data untuk grafik
                const labels = chartData.map(item => item.namaBidangPraktik);
                const dataTarget = chartData.map(item => item.levelTarget ?? 0);
                const dataAktual = chartData.map(item => item.levelSaatIni ?? 0);

                const options = {
                    series: [{
                            name: 'Level Target',
                            data: dataTarget
                        },
                        {
                            name: 'Level Saat Ini',
                            data: dataAktual
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 400
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true, // ini dia kuncinya!
                            barHeight: '70%',
                            endingShape: 'rounded'
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: val => val.toFixed(1) // tampilkan float 1 angka di belakang koma
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: labels,
                    },
                    yaxis: {
                        title: {
                            text: 'Level'
                        },
                        min: 0,
                        max: 5,
                        tickAmount: 5
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val.toFixed(1)
                            }
                        }
                    },
                    colors: ['#1679AB', '#FFB100']
                };


                // Gambar chart
                const chart = new ApexCharts(document.querySelector("#" + chartId), options);
                chart.render();
            });
        });


        var JSPageScriptCustom = function() {
            // Private functions
            var initDataTable = function() {
                var table = $('#dataTable');

                // begin first table
                table.DataTable({
                    responsive: true,
                    autoWidth: false, // tambahkan ini agar tidak error karena rowspan
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    pageLength: 10,
                    language: {
                        "lengthMenu": "Tampilkan _MENU_",
                        "zeroRecords": "Tidak ada yang ditemukan - maaf",
                        "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        "search": "Cari:",
                        "infoEmpty": "Tidak ada data yang tersedia",
                        "infoFiltered": "(difilter dari total _MAX_ data)"
                    },
                    order: [],
                    columnDefs: [{
                            targets: 0, // kolom Nomor
                            orderable: false,
                            searchable: false
                        },
                        {
                            targets: 8, // kolom 'Level Kematangan'
                            orderable: false
                        }
                    ],

                    dom: "<'row'<'col-md-3 col-sm-12 custom_btn'l><'col-md-6 col-sm-12'><'col-md-3 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12 dataTables_pager'p>>",
                });
            };

            return {
                // Public functions
                init: function() {
                    initDataTable();
                },
            };
        }();

        jQuery(document).ready(function() {
            JSPageScriptCustom.init();
        });
    </script>
@endsection

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ringkasan - Detail Penilaian</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-subtitle"><a href="{{ route('admin.home.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item text-subtitle"><a
                                    href="{{ route('admin.home.rekapan.index', $findDaftarPenilaian->id) }}">Ringkasan
                                    Penilaian</a>
                            </li>
                            <li class="breadcrumb-item text-subtitle"><a
                                    href="{{ route('admin.home.rekapan.detail', $findDaftarPenilaian->id) }}">Detail
                                    Ringkasan</a>
                            </li>
                            <li class="breadcrumb-item active text-subtitle" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body pt-3 pb-2">
                            <div class="row justify-content-between  g-2">
                                <div class="col-auto">
                                    <h6 class="py-0">{{ $findDaftarPenilaian->name }}
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('admin.home.rekapan.index', ['id_daftar_penilaian' => $findDaftarPenilaian->id]) }}"
                                        class="btn btn-secondary btn-sm reload">
                                        <i class="bi bi-arrow-clockwise"></i>
                                        Refresh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.pages.rekapan-penilaian.tab._penilaian_tab')
                <div class="col-12">
                    @include('generals._validation')
                    <div class="row">
                        @forelse ($getAllQuestion->sortBy('id')->values() as $index=>$itemQuestion)
                            @include('admin.pages.rekapan-penilaian.answer._answer_master')
                        @empty
                            <!-- Jika tidak ada data, tampilkan gambar default -->
                            <div class="col-12 text-center">
                                <img src="{{ asset('assets/images/default/empty-default.png') }}" alt="Data Kosong"
                                    class="img-fluid" width="300">
                                <h5 class="mt-3">Belum ada data yang tersedia</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
