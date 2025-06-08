<h5>Bidang Kapabilitas</h5>
<div class="row mb-4">
    @forelse ($getAllDomainQuestion as $indexQuestion => $itemQuestion)
        @if ($itemQuestion->id == $getQuestionById->id)
            @foreach ($itemQuestion->questionAnswerBidKapabilitas->sortBy('id')->values() as $indexItemQuestionAnswerBidKapabilitas => $itemQuestionAnswerBidKapabilitas)
                <div class="col-md-4 mt-2 col-12">
                    <a href="{{ route('admin.daftar-penilaian.penilaian.index', ['id_daftar_penilaian' => $findDaftarPenilaian->id, 'page' => $itemQuestion->id, 'sub_page' => $itemQuestionAnswerBidKapabilitas->id]) }}"
                        class="btn {{ request()->sub_page == $itemQuestionAnswerBidKapabilitas->id || (!isset(request()->sub_page) && $indexItemQuestionAnswerBidKapabilitas == 0) ? ($itemQuestionAnswerBidKapabilitas->is_completed_answer ? 'btn-success' : 'btn-primary') : ($itemQuestionAnswerBidKapabilitas->is_completed_answer ? 'btn-outline-success' : 'btn-outline-primary') }} icon icon-left col-12"
                        style="text-align: left;"><i class="bi bi-check2-square"></i>
                        {{ $itemQuestionAnswerBidKapabilitas->bidangKapabilitas?->code . ' - ' . $itemQuestionAnswerBidKapabilitas->bidangKapabilitas?->name }}</a>
                </div>
            @endforeach
        @endif
    @empty
    @endforelse
</div>
<hr>
