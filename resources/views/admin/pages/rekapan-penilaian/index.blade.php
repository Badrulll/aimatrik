@extends('admin.layouts.app')

@section('title', 'Manajemen Penilaian - Data Penilaian')

@section('customJs')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        const chartData = Object.values(@json($dataRingkasan));

        $(document).ready(function() {
            // Definisikan saat pertama kali diload
            chartRadarLevelBidang();
        });

        // Membuat chart
        const chartRadarLevelBidang = () => {
            const labels = chartData.map(item => item.domain);
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
                    height: 600,
                    type: 'radar'
                },

                xaxis: {
                    categories: labels
                },
                yaxis: {
                    min: 0,
                    max: 5,
                    tickAmount: 5
                },
                tooltip: {
                    y: {
                        formatter: val => val.toFixed(1)
                    }
                },
                stroke: {
                    width: 2,
                    colors: ['#1E90FF', '#FFA500'], // Biru & Oranye
                    curve: 'smooth'
                },
                fill: {
                    opacity: 0.0
                },
                markers: {
                    size: 8,
                    colors: ['#1E90FF', '#FFA500'],
                    strokeWidth: 2
                },
                colors: ['#1679AB', '#FFB100']
            };

            const chart = new ApexCharts(document.querySelector("#chart-ringkasan"), options);
            chart.render();
        };

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
                    <h3>Rekapan Penilaian - Ringkasan</h3>
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
                                    <a href="{{ route('admin.home.rekapan.print', ['id_daftar_penilaian' => $findDaftarPenilaian->id]) }}"
                                        class="btn btn-warning btn-sm reload text-white">
                                        <i class="bi bi-download"></i>
                                        Cetak Rekapan
                                    </a>
                                    @if ($findDaftarPenilaian->count_domain_question > 0)
                                        <a href="{{ route('admin.home.rekapan.detail', ['id_daftar_penilaian' => $findDaftarPenilaian->id]) }}"
                                            class="btn btn-primary btn-sm reload">
                                            <i class="bi bi-eye"></i>
                                            Detail Rekapan
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-card-checklist"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">
                                        Total Domain
                                    </h6>
                                    <h4 class="font-extrabold mb-0">{{ $findDaftarPenilaian->count_domain_question ?? 0 }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-check-square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Domain Terjawab</h6>
                                    <h4 class="font-extrabold mb-0">{{ $findDaftarPenilaian->count_domain_answered ?? 0 }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-percent"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Persentase Terjawab</h6>
                                    <h4 class="font-extrabold mb-0">
                                        {{ $findDaftarPenilaian->count_domain_question == 0 ? 0 : ($findDaftarPenilaian->count_domain_answered / $findDaftarPenilaian->count_domain_question) * 100 ?? 0 }}%
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    @include('generals._validation')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row justify-content-between g-2">
                                        <div class="col-auto">
                                            <h5>Hasil Penilaian</h5>
                                        </div>
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                    <div class="d-flex d-inline-block ">

                                    </div>

                                </div>
                                <div class="card-body">
                                    <h6>1. Maturity Level</h6>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable">
                                            <thead class="bg-primary">
                                                <tr class="text-white">
                                                    <th style="width: 5%">No</th>
                                                    <th>Domain</th>
                                                    <th>Level Saat Ini</th>
                                                    <th>Level Target</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $prevKematangan = null;
                                                    $rowspan = 0;
                                                @endphp

                                                @foreach ($dataRingkasan as $index => $item)
                                                    @php

                                                    @endphp
                                                    <tr>
                                                        <td class="bg-primary text-white">{{ $loop->iteration }}</td>
                                                        <td>{{ $item['domain'] }}</td>
                                                        <td>{{ is_null($item['levelSaatIni']) ? '-' : number_format($item['levelSaatIni'], 1) }}
                                                        </td>
                                                        <td>{{ is_null($item['levelTarget']) ? '-' : number_format($item['levelTarget'], 1) }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot class="bg-primary">
                                                <tr class="text-white h6">
                                                    <td colspan="2">Maturity Level Institusi Pendidikan Tinggi</td>
                                                    <td>{{ is_null($minLevelAllKematangan) ? '-' : number_format($minLevelAllKematangan, 1) }}
                                                    </td>
                                                    <td>{{ is_null($minLevelAllTarget) ? '-' : number_format($minLevelAllTarget, 1) }}
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <hr>
                                    <h6 class="mt-4">2. Grafik Perbandingan</h6>
                                    <div id="chart-ringkasan"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
