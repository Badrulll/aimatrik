<table style="width: 100%; border-collapse: collapse;" border="1">
    <thead>
        <tr style="background-color: #3D90D7; color: white">
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
            $rekapanRowIndex = 1;
            $levelKematanganDomain = null;
            $grouped = collect($itemQuestion['ringkasanPerDomain'])->groupBy('levelKematangan')->values();
        @endphp

        @foreach ($grouped as $level => $items)
            @foreach ($items as $i => $item)
                <tr @if ($i % 2 != 0) style="background-color: #eaeaea;" @endif>
                    {{-- Merge Kolom Nama Bidang Kapabilitas --}}
                    @if (!in_array($item['idBidangKapabilitas'], $renderedBidangKapabilitas))
                        @php
                            // Hitung rowspan berdasarkan jumlah data untuk Bidang Kapabilitas
                            $rowspan = $items->where('idBidangKapabilitas', $item['idBidangKapabilitas'])->count();
                            $renderedBidangKapabilitas[] = $item['idBidangKapabilitas'];
                        @endphp

                        <td style="background-color: #3D90D7; color: white" rowspan="{{ $rowspan }}">
                            {{ $rekapanRowIndex }}
                        </td>
                        @php $rekapanRowIndex++; @endphp

                        <td rowspan="{{ $rowspan }}">{{ $item['namaBidangKapabilitas'] }}
                        </td>
                    @endif

                    {{-- Tambahkan kolom kosong jika Bidang Kapabilitas sudah ada sebelumnya --}}
                    @if (in_array($item['idBidangKapabilitas'], $renderedBidangKapabilitas))
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                    @endif

                    <td>{{ $item['namaBidangPraktik'] }}</td>
                    <td>{{ is_null($item['levelSaatIni']) ? '-' : number_format($item['levelSaatIni'], 1) }}
                    </td>
                    <td>{{ is_null($item['levelTarget']) ? '-' : number_format($item['levelTarget'], 1) }}
                    </td>
                    <td>{{ is_null($item['celah']) ? '-' : number_format($item['celah'], 1) }}</td>
                    <td>{{ is_null($item['performa']) ? '-' : $item['performa'] }}</td>
                    <td style="text-align: {{ !empty(trim($item['rekomendasi'] ?? '')) ? 'justify' : 'center' }}">
                        {!! !empty(trim($item['rekomendasi'] ?? '')) ? $item['rekomendasi'] : '-' !!}
                    </td>

                    {{-- Merge Kolom Level Kematangan --}}
                    @php
                        $keyLevel = $item['idBidangKapabilitas'] . '-' . $item['levelKematangan'];
                    @endphp

                    @if (!in_array($keyLevel, $renderedLevelKematangan) && !is_null($item['levelKematangan']))
                        @php
                            $rowspan = $items
                                ->where('idBidangKapabilitas', $item['idBidangKapabilitas'])
                                ->where('levelKematangan', $item['levelKematangan'])
                                ->count();
                            $renderedLevelKematangan[] = $keyLevel;
                            $levelKematanganDomain =
                                $levelKematanganDomain <= $item['levelKematangan'] && !is_null($levelKematanganDomain)
                                    ? $levelKematanganDomain
                                    : $item['levelKematangan'];
                        @endphp
                        <td rowspan="{{ $rowspan }}" style="text-align: center; vertical-align: middle;">
                            {{ number_format($item['levelKematangan'], 1) }}
                        </td>
                    @elseif (is_null($item['levelKematangan']))
                        <td>-</td>
                    @else
                        <td style="display: none;"></td>
                    @endif
                </tr>
            @endforeach
        @endforeach
    </tbody>
    <tfoot>
        <tr style="background-color: #3D90D7; color: white">
            <th colspan="8" style="text-align: end">
                Maturity Level Domain
            </th>
            <th style="text-align: center">
                {{ number_format($levelKematanganDomain, 1) }}
            </th>
        </tr>
    </tfoot>
</table>
<br>
<h3>3. Grafik Perbandingan</h3>
<div class="chart-container">
    @php
        $groupedByIdBidangKapabilitas = collect($itemQuestion['ringkasanPerDomain'])
            ->groupBy('idBidangKapabilitas')
            ->values();
    @endphp
    @foreach ($groupedByIdBidangKapabilitas as $level => $items)
        <br>
        <br>
        <center><strong>Grafik {{ $loop->iteration }}.
                {{ $items[$loop->iteration]['namaBidangKapabilitas'] ?? '' }}</strong>
        </center>
        <div class="chart-level-bidang" data-data="{{ json_encode($items) }}">
        </div>
    @endforeach
</div>
