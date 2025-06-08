<table>
    <tr>
        <td>
            <h6>
                Achivement Score
            </h6>
        </td>
        <td>
            <h6>
                :
            </h6>
        </td>
        <td>
            <h6><strong
                    id="achivement-score-{{ $itemQuestionAnswerBidPraktik->id . '-' . $level }}">{{ is_null($arrDataGroupByLevel[$level]['achievement']) ? '' : number_format($arrDataGroupByLevel[$level]['achievement'], 2) . '%' }}</strong>
            </h6>
        </td>
    </tr>
    <tr>
        <td>
            <h6>
                Keterangan
            </h6>
        </td>
        <td>
            <h6>
                :
            </h6>
        </td>
        <td>
            <h6><strong
                    id="keterangan-score-{{ $itemQuestionAnswerBidPraktik->id . '-' . $level }}">{{ is_null($arrDataGroupByLevel[$level]['keterangan']) ? '' : $arrDataGroupByLevel[$level]['keterangan'] }}</strong>
            </h6>
        </td>
    </tr>
    <tr>
        <td>
            <h6>
                Catatan
            </h6>
        </td>
        <td>
            <h6>
                :
            </h6>
        </td>
        <td>
            @php
                $catatan = '';
                if (!is_null($arrDataGroupByLevel[$level]['achievement'])) {
                    if ($arrDataGroupByLevel[$level]['catatan'] !== 'F' && $lastIndex !== $level) {
                        $catatan = 'Tidak Bisa Lanjut Ke Level ' . ($level + 1);
                    } elseif ($arrDataGroupByLevel[$level]['catatan'] === 'F' && $lastIndex !== $level) {
                        $catatan = 'Bisa Lanjut Ke Level ' . ($level + 1);
                    }
                }
            @endphp
            <h6><strong
                    id="catatan-score-{{ $itemQuestionAnswerBidPraktik->id . '-' . $level }}">{{ $catatan }}</strong>
            </h6>
        </td>
    </tr>
</table>
