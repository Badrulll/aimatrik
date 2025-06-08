<div class="row">
    @if (!$findDaftarPenilaian->is_publish)
        <div class="col-lg-12 col-12 d-flex flex-column justify-content-center align-items-center"
            style="min-height: 200px;">
            <p class="text-center mb-3">
                Anda harus menambahkan <strong>Level Target</strong> sebelum menambahkan penilaian
            </p>
            <a href="javascript:void(0)" type="button" onclick="simpanLevelTarget(this)"
                data-id_level="{{ $itemQuestionAnswerBidPraktik->id }}"
                data-level_target="{{ $itemQuestionAnswerBidPraktik->level_target }}" class="btn btn-primary btn-sm">
                Tambah Level Target
            </a>
        </div>
    @else
        <div class="col-lg-12 col-12 d-flex flex-column justify-content-center align-items-center"
            style="min-height: 200px;">
            <p class="text-center mb-3">
                Anda harus menambahkan <strong>Level Target</strong> sebelum menambahkan penilaian. <br> Untuk
                menambahkan,
                silahkan Unpublish Penilaian
                terlebih dahulu
            </p>
        </div>
    @endif

</div>
