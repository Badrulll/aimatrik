<div class="modal fade text-left" id="modalCreatePraktik" tabindex="-1" role="dialog" aria-labelledby="modalCreatePraktik"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modalCreatePraktik">
                    <h5>
                        Buat Praktik Baru -
                        {{ \Illuminate\Support\Str::limit($findBidangPraktik->name, 20, '...') }}
                    </h5>
                    <small class="text-danger text-sm">* Wajib diisi</small>
                </div>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-horizontal"
                action="{{ route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.praktik.store', ['id_domain' => $findDomain->id, 'id_bidang_kapabilitas' => $findBidangKapabilitas->id, 'id_bidang_praktik' => $findBidangPraktik->id]) }}"
                method="POST">
                @csrf
                <div class="modal-body overflow-auto rute-modal">
                    <section id="basic-horizontal-layouts">

                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" name="domain_id" value="{{ $findDomain->id }}" required>
                                <input type="hidden" name="bidang_kapabilitas_id"
                                    value="{{ $findBidangKapabilitas->id }}" required>
                                <input type="hidden" name="bidang_praktik_id" value="{{ $findBidangPraktik->id }}"
                                    required>
                                <div class="col-12 col-md-12">
                                    <label>Praktik<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <textarea rows="5" required class="form-control @error('praktik') is-invalid @enderror" placeholder="Praktik"
                                                name="praktik">{{ old('praktik') ?? null }}</textarea>
                                            <div class="form-control-icon">
                                                <i class="bi bi-regex"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Kategori Level<span class="text-danger"> *</span></label>
                                    <select required
                                        class="form-control select2-kategori-level @error('kategori_level') is-invalid @enderror"
                                        name="kategori_level">
                                        <option value="">-- Pilih Kategori Level --</option>
                                        @foreach (App\Constants\AppConst::LEVEL_MAP as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-check form-check-lg d-flex align-items-end">
                                        <input class="form-check-input me-2" type="checkbox" name="is_active"
                                            value="active" id="is_active" checked>
                                        <label class="form-check-label text-gray-600" for="is_active">
                                            Aktifkan Praktik
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary me-1 mb-1">Simpan
                        Data</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
