<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/extensions/printjs/print.min.js') }}"></script>
<script>
    const chartRadarData = Object.values(@json($dataRingkasan));

    $(document).ready(function() {
        chartRadarLevelBidang();
    });

    const chartRadarLevelBidang = () => {
        const labels = chartRadarData.map(item => item.domain);
        const dataTarget = chartRadarData.map(item => item.levelTarget ?? 0);
        const dataAktual = chartRadarData.map(item => item.levelSaatIni ?? 0);

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
                height: 400,
                type: 'radar',
                toolbar: {
                    show: false // Hilangkan tombol download
                }
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
                colors: ['#1E90FF', '#FFA500'],
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

    $(document).ready(function() {
        // Loop melalui semua elemen dengan class .chart-level-bidang
        $('.chart-level-bidang').each(function(index, element) {
            // Ambil data yang ada pada atribut data-data
            const chartData = JSON.parse($(element).attr('data-data'));

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
                    height: 400,
                    toolbar: {
                        show: false // ⛔️ Matikan tombol export/download
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: '70%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: val => val.toFixed(1)
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: labels
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
            const chart = new ApexCharts(element, options);
            chart.render();
        });
    });

    function printContent() {
        printJS({
            printable: 'print-area', // pastikan ini ID yang benar
            type: 'html',
            targetStyles: ['*'],
            scanStyles: false,
            documentTitle: 'Rekapan Penilaian Tata Kelola Kecerdasan Buatan (AI)  - {{ $findDaftarPenilaian->name }}',
            style: `
                @page {
                    size: A4 landscape;
                    margin: 0.5cm;
                }

                body {
                    font-family: Arial, sans-serif;
                    font-size: 12pt;
                    color: #000;
                    margin: 0;
                    padding: 0;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 11pt;
                }

                .chart-container, .no-break {
                    page-break-inside: avoid;
                    break-inside: avoid;
                    page-break-before: auto;
                    page-break-after: auto;
                }

                table, th, td {
                    border: 1px solid #000;
                }

                th, td {
                    padding: 6px 10px;
                    text-align: left;
                }

                h1, h2, h3, h4, h5 {
                    margin: 6px 0;
                }

                .section {
                    margin-bottom: 20px;
                }

                .bg-secondary {
                    background-color: #eaeaea !important;
                }

                .print-container {
                    width: 100%;
                    max-width: 297mm;
                    margin: auto;
                    background: white;
                    padding: 1cm;
                    box-sizing: border-box;
                }

                .print-container.print-cover-page {
                    page-break-after: auto;
                }
            `,
        });
    }
</script>
