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
                <h6>1. Gap dan Maturity Level</h6>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead class="bg-primary">
                            <tr class="text-white">
                                <th>No</th>
                                <th>Bidang Kapabilitas</th>
                                <th>Bidang Praktik</th>
                                <th>Level Saat Ini</th>
                                <th>Level Target</th>
                                <th>Gap</th>
                                <th>Performa</th>
                                <th>Rekomendasi Praktik</th>
                                <th>Maturity Level</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $renderedBidangKapabilitas = [];
                                $renderedLevelKematangan = [];
                                $rowIndex = 1;
                            @endphp

                            @php
                                $levelKematanganDomain = null;
                            @endphp
                            @foreach ($itemQuestion->questionAnswerBidKapabilitas->sortBy('id')->values() as $itemQuestionAnswerBidKapabilitas)
                                @foreach ($hitungRekapPenilaian as $index => $item)
                                    @if ($item['idBidangKapabilitas'] == $itemQuestionAnswerBidKapabilitas->id)
                                        <tr>
                                            {{-- Merge Kolom Nama Bidang Kapabilitas --}}
                                            @if (!in_array($item['idBidangKapabilitas'], $renderedBidangKapabilitas))
                                                @php
                                                    $rowspan =
                                                        $mergedRowspan[$item['idBidangKapabilitas']]['total'] ?? 1;
                                                    $renderedBidangKapabilitas[] = $item['idBidangKapabilitas'];
                                                @endphp

                                                <td class="bg-primary text-white" rowspan="{{ $rowspan }}">
                                                    {{ $rowIndex }}</td>
                                                <td rowspan="{{ $rowspan }}">{{ $item['namaBidangKapabilitas'] }}
                                                </td>

                                                @php $rowIndex++; @endphp
                                            @endif

                                            {{-- Kalau kolom sudah muncul di atas, tambahkan dummy kolom agar kolom tetap 9 --}}
                                            @if (in_array($item['idBidangKapabilitas'], $renderedBidangKapabilitas))
                                                @php $isFirst = $loop->first; @endphp
                                                @if (!$isFirst)
                                                    {{-- Kosongkan kolom yang sudah rowspan di baris atas --}}
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                @endif
                                            @endif

                                            <td>{{ $item['namaBidangPraktik'] }}</td>
                                            <td>{{ is_null($item['levelSaatIni']) ? '-' : number_format($item['levelSaatIni'], 1) }}
                                            </td>
                                            <td>{{ is_null($item['levelTarget']) ? '-' : number_format($item['levelTarget'], 1) }}
                                            </td>
                                            <td>{{ is_null($item['celah']) ? '-' : number_format($item['celah'], 1) }}
                                            </td>
                                            <td>{{ is_null($item['performa']) ? '-' : $item['performa'] }}</td>
                                            <td
                                                style="text-align: {{ !empty(trim($item['rekomendasi'] ?? '')) ? 'justify' : 'center' }}">
                                                {!! !empty(trim($item['rekomendasi'] ?? '')) ? $item['rekomendasi'] : '-' !!}
                                            </td>


                                            {{-- Merge Kolom Level Kematangan --}}
                                            @php
                                                $keyLevel =
                                                    $item['idBidangKapabilitas'] . '-' . $item['levelKematangan'];
                                            @endphp

                                            @if (!in_array($keyLevel, $renderedLevelKematangan) && !is_null($item['levelKematangan']))
                                                @php
                                                    $rowspan =
                                                        $mergedRowspan[$item['idBidangKapabilitas']]['level'][
                                                            $item['levelKematangan']
                                                        ] ?? 1;
                                                    $renderedLevelKematangan[] = $keyLevel;
                                                    $levelKematanganDomain =
                                                        $levelKematanganDomain <= $item['levelKematangan'] &&
                                                        !is_null($levelKematanganDomain)
                                                            ? $levelKematanganDomain
                                                            : $item['levelKematangan'];
                                                @endphp
                                                <td rowspan="{{ $rowspan }}"
                                                    style="text-align: center; vertical-align: middle;">
                                                    {{ number_format($item['levelKematangan'], 1) }}
                                                </td>
                                            @elseif (is_null($item['levelKematangan']))
                                                <td>-</td>
                                            @else
                                                <td style="display: none;"></td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach

                        </tbody>
                        <tfoot class="bg-primary">
                            <tr class="text-white h6">
                                <th colspan="8" style="text-align: end">
                                    Maturity Level Domain
                                </th>
                                <th style="text-align: center">
                                    {{ number_format($levelKematanganDomain, 1) }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <hr>
                @php
                    // Mengelompokkan data berdasarkan idBidangKapabilitas terlebih dahulu
                    $rekapGroupedByBidang = collect($hitungRekapPenilaian)->groupBy('idBidangKapabilitas');
                @endphp

                @foreach ($itemQuestion->questionAnswerBidKapabilitas->sortBy('id')->values() as $itemQuestionAnswerBidKapabilitas)
                    @php
                        // Ambil data untuk bidang kapabilitas tertentu
                        $filteredData = $rekapGroupedByBidang->get($itemQuestionAnswerBidKapabilitas->id, []);
                    @endphp

                    <h6 class="mt-4">{{ $loop->iteration + 1 }}. Grafik Perbandingan
                        {{ $itemQuestionAnswerBidKapabilitas->bidangKapabilitas?->code }} -
                        {{ $itemQuestionAnswerBidKapabilitas->bidangKapabilitas?->name }}</h6>

                    <div id="chart-level-bidang-{{ $loop->index }}" class="chart-level-bidang"
                        data-data='@json($filteredData)' data-id="chart-level-bidang-{{ $loop->index }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
