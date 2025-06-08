<div class="section">
    <h3><strong>1. Maturity Level</strong></h3>
    <br>
    <table>
        <thead>
            <tr style="background-color: #3D90D7; color: white">
                <th>No</th>
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
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-secondary' : '' }}">
                    <td style="background-color: #3D90D7; color: white">{{ $loop->iteration }}</td>
                    <td>{{ $item['domain'] }}</td>
                    <td>{{ is_null($item['levelSaatIni']) ? '-' : number_format($item['levelSaatIni'], 1) }}
                    </td>
                    <td>{{ is_null($item['levelTarget']) ? '-' : number_format($item['levelTarget'], 1) }}
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot class="bg-primary text-white">
            <tr style="background-color: #3D90D7; color: white">
                <td colspan="2">Maturity Level Institusi Pendidikan Tinggi</td>
                <td>{{ is_null($minLevelAllKematangan) ? '-' : number_format($minLevelAllKematangan, 1) }}
                </td>
                <td>{{ is_null($minLevelAllTarget) ? '-' : number_format($minLevelAllTarget, 1) }}
                </td>
            </tr>
        </tfoot>
    </table>
    <br>
    <h3><strong>2. Grafik Perbandingan</strong></h3>
    <div class="chart-container">
        <div id="chart-ringkasan"></div>
    </div>
</div>
