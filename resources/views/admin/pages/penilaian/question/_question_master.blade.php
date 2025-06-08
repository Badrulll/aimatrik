@forelse ($itemQuestion->questionAnswerBidKapabilitas->sortBy('id')->values() as $itemQuestionAnswerBidKapabilitas)
    <div class="col-12">
        <div class="accordion" id="cardAccordion">
            <div class="accordion" id="accordionSection-{{ $itemQuestion->id }}">
                @foreach ($itemQuestionAnswerBidKapabilitas->questionAnswerBidPraktik->sortBy('id')->values() as $indexItemQuestionAnswerBidPraktik => $itemQuestionAnswerBidPraktik)
                    @include('admin.pages.penilaian.question._accordion')
                @endforeach
            </div>
        </div>
    </div>
@empty
    <!-- Jika tidak ada data, tampilkan gambar default -->
    <div class="col-12 text-center">
        <img src="{{ asset('assets/images/default/empty-default.png') }}" alt="Data Kosong" class="img-fluid"
            width="300">
        <h5 class="mt-3">Belum ada data yang tersedia</h5>
    </div>
@endforelse
