<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Praktik</th>
            <th>Pelaksanaan</th>
            <th>Catatan & File Pendukung</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $indexItemQuestionAnswerPraktik => $itemQuestionAnswerPraktik)
            @php
                $info = [
                    'id_level' => $itemQuestionAnswerBidPraktik->id,
                    'id_first_level' => $firstIndex,
                    'id_this_level' => $level,
                    'id_next_level' => $level + 1,
                    'id_last_level' => $lastIndex,
                ];
            @endphp

            <tr id="praktik-{{ $itemQuestionAnswerPraktik->id }}"
                style="background-color: {{ $indexItemQuestionAnswerPraktik % 2 == 0 ? '#fff' : '#eaeaea' }}">
                <td style="width: 5%; text-align: center">{{ $loop->iteration }}</td>
                <td style="width: 35%; text-align: justify">
                    {{ $itemQuestionAnswerPraktik->praktik?->praktik }}
                </td>
                <td style="width: 20%">
                    <select onchange="hitungNilaiLevel(this)" data-info='@json($info)'
                        class="form-control select2-nplf @error('pelaksanaan') is-invalid @enderror"
                        {{ $findDaftarPenilaian->is_publish ? 'disabled' : '' }}
                        name="pelaksanaan[{{ $itemQuestionAnswerBidPraktik->id }}][{{ $level }}][{{ $itemQuestionAnswerPraktik->id }}]">
                        <option></option>
                        @foreach (\App\Constants\AppConst::NPLF_ARR as $nplfIndex => $nplfLevel)
                            <option value="{{ $nplfIndex }}"
                                {{ $itemQuestionAnswerPraktik->answer == $nplfIndex ? 'selected' : '' }}>
                                {{ $nplfLevel }}</option>
                        @endforeach
                    </select>
                </td>
                <td style="width: 10%">
                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDetail{{ $itemQuestionAnswerPraktik->id }}" aria-expanded="false"
                        aria-controls="collapseDetail{{ $itemQuestionAnswerPraktik->id }}">
                        Tampilkan
                    </button>
                </td>
            </tr>
            <tr class="collapse" id="collapseDetail{{ $itemQuestionAnswerPraktik->id }}">
                <td colspan="4">
                    <div class="p-3 bg-light border rounded">
                        <div class="mb-3">
                            <label class="form-label">Catatan</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror"
                                {{ $findDaftarPenilaian->is_publish ? 'disabled' : '' }}
                                name="catatan[{{ $itemQuestionAnswerBidPraktik->id }}][{{ $level }}][{{ $itemQuestionAnswerPraktik->id }}]"
                                rows="4">{{ $itemQuestionAnswerPraktik->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            @if (!$findDaftarPenilaian->is_publish)
                                @php
                                    $assetCheck = (new App\Services\Asset\AssetQueryService())->getAllAsset(
                                        pathType: App\Models\QuestionAnswerPraktik::class,
                                        pathId: $itemQuestionAnswerPraktik->id,
                                        withAssetKey: 'penilaian-file-pendukung-',
                                        usingLike: true,
                                    );
                                @endphp
                                @if ($assetCheck->count() > 0)
                                    <div class="row">
                                        <div class="col-8">
                                            <label class="form-label">File Pendukung <span
                                                    class="text-danger">**</span></label>
                                            <input type="file" multiple accept=".png, .jpg, .jpeg, .pdf, .doc, .docx"
                                                class="form-control @error('file_pendukung') is-invalid @enderror"
                                                name="file_pendukung[{{ $itemQuestionAnswerBidPraktik->id }}][{{ $level }}][{{ $itemQuestionAnswerPraktik->id }}][]">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Preview </label>
                                            <a href="javascript:void(0)" onclick="previewFilePendukung(this)"
                                                data-id_target="{{ $itemQuestionAnswerPraktik->id }}"
                                                class="btn btn-sm mt-1 btn-primary col-12">
                                                Lihat File Pendukung
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">File Pendukung <span
                                                    class="text-danger">**</span></label>
                                            <input type="file" multiple accept=".png, .jpg, .jpeg, .pdf, .doc, .docx"
                                                class="form-control @error('file_pendukung') is-invalid @enderror"
                                                name="file_pendukung[{{ $itemQuestionAnswerBidPraktik->id }}][{{ $level }}][{{ $itemQuestionAnswerPraktik->id }}][]">
                                        </div>
                                    </div>
                                @endif
                            @else
                                <a href="javascript:void(0)" onclick="previewFilePendukung(this)"
                                    data-id_target="{{ $itemQuestionAnswerPraktik->id }}"
                                    class="btn btn-sm mt-1 btn-primary col-12">
                                    Lihat File Pendukung
                                </a>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
