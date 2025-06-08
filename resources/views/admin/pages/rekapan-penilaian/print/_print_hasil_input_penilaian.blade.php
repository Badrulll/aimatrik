<table style="width: 100%; border-collapse: collapse;" border="1">
    <thead>
        <tr style="background-color: #3D90D7; color: white">
            <th>No</th>
            <th>Bidang Kapabilitas</th>
            <th>Bidang Praktik</th>
            <th>Level Praktik</th>
            <th>Praktik</th>
            <th>Pelaksanaan</th>
            <th>Level Saat Ini</th>
            <th>Level Target</th>
            <th>Achievement</th>
            <th>Keterangan</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;

            $rowspanBidangKapabilitas = [];
            foreach ($getAllAnswer[$index] as $item) {
                $key = $item['bidangKapabilitas'];
                $rowspanBidangKapabilitas[$key] = ($rowspanBidangKapabilitas[$key] ?? 0) + 1;
            }

            $lastLevelPerPraktik = [];
            $rowspanBidangPraktik = [];
            foreach ($getAllAnswer[$index] as $item) {
                $key = $item['bidangKapabilitas'] . '|' . $item['bidangPraktik'];
                $rowspanBidangPraktik[$key] = ($rowspanBidangPraktik[$key] ?? 0) + 1;
                if (!isset($lastLevelPerPraktik[$key])) {
                    $lastLevelPerPraktik[$key] = $item['level'];
                } else {
                    // Kalau sudah ada, ambil level yang lebih tinggi
                    $lastLevelPerPraktik[$key] = max($lastLevelPerPraktik[$key], $item['level']);
                }
            }

            $rowspanLevelPraktik = [];
            foreach ($getAllAnswer[$index] as $item) {
                $key = $item['bidangKapabilitas'] . '|' . $item['bidangPraktik'] . '|' . $item['level'];
                $rowspanLevelPraktik[$key] = ($rowspanLevelPraktik[$key] ?? 0) + 1;
            }

            $rowspanLevelPerPraktikOnly = [];
            foreach ($getAllAnswer[$index] as $item) {
                $key = $item['bidangKapabilitas'] . '|' . $item['bidangPraktik'];
                $rowspanLevelPerPraktikOnly[$key] = ($rowspanLevelPerPraktikOnly[$key] ?? 0) + 1;
            }

            $printedBidangKapabilitas = [];
            $printedBidangPraktik = [];
            $printedLevelPraktik = [];
            $printedLevelPraktikExtra = [];
        @endphp

        @foreach ($getAllAnswer[$index] as $indexItemAnswer => $itemAnswer)
            <tr @if ($indexItemAnswer % 2 != 0) style="background-color: #eaeaea;" @endif>
                {{-- No & Bidang Kapabilitas --}}
                @php
                    $keyBidangKapabilitas = $itemAnswer['bidangKapabilitas'];
                @endphp
                @if (!in_array($keyBidangKapabilitas, $printedBidangKapabilitas))
                    <td rowspan="{{ $rowspanBidangKapabilitas[$keyBidangKapabilitas] }}"
                        style="background-color: #3D90D7; color: white">
                        {{ $no++ }}</td>
                    <td rowspan="{{ $rowspanBidangKapabilitas[$keyBidangKapabilitas] }}">
                        {{ $itemAnswer['bidangKapabilitas'] }}</td>
                    @php
                        $printedBidangKapabilitas[] = $keyBidangKapabilitas;
                    @endphp
                @endif

                {{-- Bidang Praktik --}}
                @php
                    $keyBidangPraktik = $itemAnswer['bidangKapabilitas'] . '|' . $itemAnswer['bidangPraktik'];
                @endphp
                @if (!in_array($keyBidangPraktik, $printedBidangPraktik))
                    <td rowspan="{{ $rowspanBidangPraktik[$keyBidangPraktik] }}">
                        {{ $itemAnswer['bidangPraktik'] }}</td>
                    @php
                        $printedBidangPraktik[] = $keyBidangPraktik;
                    @endphp
                @endif

                {{-- Level Praktik --}}
                @php
                    $keyLevelPraktik =
                        $itemAnswer['bidangKapabilitas'] .
                        '|' .
                        $itemAnswer['bidangPraktik'] .
                        '|' .
                        $itemAnswer['level'];
                @endphp
                @if (!in_array($keyLevelPraktik, $printedLevelPraktik))
                    <td rowspan="{{ $rowspanLevelPraktik[$keyLevelPraktik] }}">
                        {{ $itemAnswer['level'] }}</td>
                    @php
                        $printedLevelPraktik[] = $keyLevelPraktik;
                    @endphp
                @endif

                {{-- Praktik --}}
                <td>{{ $itemAnswer['question'] }}</td>

                {{-- Pelaksanaan --}}
                <td>{{ $itemAnswer['answer'] }}</td>

                {{-- Level Saat Ini dan Level Target --}}
                @php
                    $keyLevelPerPraktikOnly = $itemAnswer['bidangKapabilitas'] . '|' . $itemAnswer['bidangPraktik'];
                @endphp
                @if (!isset($printedLevelPraktikExtra[$keyLevelPerPraktikOnly]))
                    <td rowspan="{{ $rowspanLevelPerPraktikOnly[$keyLevelPerPraktikOnly] }}">
                        {{ $itemAnswer['levelSaatIni'] }}
                    </td>
                    <td rowspan="{{ $rowspanLevelPerPraktikOnly[$keyLevelPerPraktikOnly] }}">
                        {{ $itemAnswer['levelTarget'] }}
                    </td>
                    @php
                        $printedLevelPraktikExtra[$keyLevelPerPraktikOnly] = true;
                    @endphp
                @endif

                {{-- Sisa Kolom Lain --}}
                @if (isset($rowspanLevelPraktik[$keyLevelPraktik]) && $rowspanLevelPraktik[$keyLevelPraktik] > 0)
                    @if (!isset($printedLevelPraktikExtra[$keyLevelPraktik]))
                        <td rowspan="{{ $rowspanLevelPraktik[$keyLevelPraktik] }}">
                            {{ !is_null($itemAnswer['achievement']) ? $itemAnswer['achievement'] . '%' : '-' }}
                        </td>
                        <td rowspan="{{ $rowspanLevelPraktik[$keyLevelPraktik] }}">
                            {{ $itemAnswer['keterangan'] }}
                        </td>
                        <td rowspan="{{ $rowspanLevelPraktik[$keyLevelPraktik] }}">
                            @php
                                $keyPraktik = $itemAnswer['bidangKapabilitas'] . '|' . $itemAnswer['bidangPraktik'];
                                $lastLevel = $lastLevelPerPraktik[$keyPraktik] ?? null;
                            @endphp

                            @if ($itemAnswer['level'] != $lastLevel)
                                {{ $itemAnswer['catatan'] != 'F' ? 'Tidak Bisa Lanjut Ke Level ' . ($itemAnswer['level'] + 1) : 'Bisa Lanjut Ke Level ' . ($itemAnswer['level'] + 1) }}
                            @endif
                        </td>
                        @php
                            $printedLevelPraktikExtra[$keyLevelPraktik] = true;
                        @endphp
                    @endif
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
