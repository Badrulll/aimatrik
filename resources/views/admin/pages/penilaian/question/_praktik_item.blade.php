<form enctype="multipart/form-data" autocomplete="off" id="form-bidang-praktik-{{ $itemQuestionAnswerBidPraktik->id }}"
    action="{{ route('admin.daftar-penilaian.penilaian.storePenilaian', ['id_daftar_penilaian' => $findDaftarPenilaian->id]) }}"
    method="post">
    @csrf

    <div class="row justify-content-between g-2">
        <div class="col-auto">
            <h5>Daftar Praktik
            </h5>
        </div>
        <div class="col-auto">
            <h6>Level Target :
                {{ $itemQuestionAnswerBidPraktik->level_target !== null ? 'Level ' . $itemQuestionAnswerBidPraktik->level_target : 'Belum Didefinisikan' }}
            </h6>
        </div>
    </div>
    @if ($itemQuestionAnswerBidPraktik->level_target !== null)
        <input class="form-control" type="hidden" name="level_target[{{ $itemQuestionAnswerBidPraktik->id }}]"
            value="{{ $itemQuestionAnswerBidPraktik->level_target ?? null }}">
        @php
            $groupedByLevel = $itemQuestionAnswerBidPraktik->questionAnswerPraktik
                ->groupBy(fn($item) => $item->praktik?->kategori_level)
                ->map(fn($group) => $group->sortBy('id')->values()) // urutkan setiap grup berdasarkan ID
                ->sortKeys(); // kalau mau urutkan berdasarkan level-nya juga

            $arrDataGroupByLevel = [];

            foreach ($groupedByLevel as $level => $items) {
                $arrValueGroupByLevel = [];

                foreach ($items as $item) {
                    $value = is_null($item->answer) ? null : App\Constants\AppConst::NPLF_VAL[$item->answer];
                    $arrValueGroupByLevel[] = $value;
                }

                if (collect($arrValueGroupByLevel)->every(fn($val) => is_null($val))) {
                    $arrDataGroupByLevel[$level] = [
                        'rerata' => null,
                        'achievement' => null,
                        'keterangan' => null,
                        'catatan' => null,
                    ];
                } else {
                    $rerata = (float) array_sum($arrValueGroupByLevel) / count($arrValueGroupByLevel);
                    $achievementScore = (float) ($rerata / 3) * 100;

                    $kategori = null;
                    foreach (App\Constants\AppConst::NPLF_MAKS_MIN as $kode => $range) {
                        if ($achievementScore >= $range['min'] && $achievementScore <= $range['max']) {
                            $kategori = array_search($kode, App\Constants\AppConst::NPLF_VAL, true);
                            break;
                        }
                    }

                    $arrDataGroupByLevel[$level] = [
                        'rerata' => (float) $rerata,
                        'achievement' => (float) $achievementScore,
                        'keterangan' => App\Constants\AppConst::NPLF_ARR[$kategori],
                        'catatan' => $kategori,
                    ];
                }
            }

            $firstIndex = $groupedByLevel->keys()->first();
            $lastIndex = $groupedByLevel->keys()->last();
            $mustShow = 0;
        @endphp

        @foreach ($groupedByLevel as $level => $items)
            @if ($items->every(fn($item) => !empty($item->answer) && $item->answer == 'F'))
                @php
                    $mustShow = $level;
                @endphp
            @endif
            <section id="level-{{ $itemQuestionAnswerBidPraktik->id . '-' . $level }}"
                class="{{ $mustShow + 1 == $level || $mustShow == $level || $firstIndex == $level ? 'd-block' : 'd-none' }}">
                <h5 class="mt-5">Level {{ $level }}</h5>
                <hr>
                <div class="text-result">
                    @include('admin.pages.penilaian.question._import_text_result')
                </div>
                <hr>
                <div class="table-responsive">
                    @include('admin.pages.penilaian.question._import_table')
                </div>
            </section>
        @endforeach
    @else
        @include('admin.pages.penilaian.question._import_add_level_target')
    @endif

    @if (!$findDaftarPenilaian->is_publish && $itemQuestionAnswerBidPraktik->level_target !== null)
        <div class="col-12 mt-4">
            <div class="d-flex justify-content-end">
                <button type="submit" id="simpan-bidang-praktik-{{ $itemQuestionAnswerBidPraktik->id }}"
                    class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                    Simpan Bidang Praktik
                </button>
            </div>
        </div>
    @endif
</form>
