<div class="modal fade text-left" id="modalCreateBidangKapabilitas" tabindex="-1" role="dialog"
    aria-labelledby="modalCreateBidangKapabilitas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modalCreateBidangKapabilitas">
                    <h5>
                        Buat Bidang Kapabilitas Baru -
                        {{ \Illuminate\Support\Str::limit($findDomain->name, 20, '...') }}
                    </h5>
                    <small class="text-danger text-sm">* Wajib diisi</small>
                </div>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-horizontal"
                action="{{ route('admin.master-data.domain.bidang-kapabilitas.store', ['id_domain' => $findDomain->id]) }}"
                method="POST">
                @csrf
                <div class="modal-body overflow-auto rute-modal">
                    <section id="basic-horizontal-layouts">

                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" name="domain_id" value="{{ $findDomain->id }}" required>
                                <div class="col-12 col-md-12">
                                    <label>Kode Bidang Kapabilitas<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" required
                                                class="form-control @error('code') is-invalid @enderror"
                                                placeholder="Kode Bidang Kapabilitas"
                                                value="{{ $nextCode ?? old('code') }}" name="code">
                                            <div class="form-control-icon">
                                                <i class="bi bi-key"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label>Nama Bidang Kapabilitas<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" required
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nama Bidang Kapabilitas" value="{{ old('name') ?? null }}"
                                                name="name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-regex"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-check form-check-lg d-flex align-items-end">
                                        <input class="form-check-input me-2" type="checkbox" name="is_active"
                                            value="active" id="is_active" checked>
                                        <label class="form-check-label text-gray-600" for="is_active">
                                            Aktifkan Bidang Kapabilitas
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
