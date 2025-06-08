<div class="modal fade text-left" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUser"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modalCreateUser">
                    <h5>
                        Buat User Baru
                    </h5>
                    <small class="text-danger text-sm">* Wajib diisi</small>
                </div>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-horizontal" action="{{ route('admin.master-data.user.store') }}" method="POST">
                @csrf
                <div class="modal-body overflow-auto rute-modal">
                    <section id="basic-horizontal-layouts">

                        <div class="form-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label>Email User<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" required
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email User" value="{{ old('email') ?? null }}"
                                                name="email">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label>Nama User<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" required
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nama User" value="{{ old('name') ?? null }}"
                                                name="name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label>Password<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" required
                                                autocomplete="current-password" placeholder="Password" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label>Konfirmasi Password<span class="text-danger"> *</span></label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Konfirmasi Password" name="password_confirmation" required
                                                autocomplete="current-password" placeholder="Password" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Hak Akses<span class="text-danger"> *</span></label>
                                    <select required
                                        class="form-control select2-role @error('role_access') is-invalid @enderror"
                                        name="role_access">
                                        <option value="">-- Pilih Hak Akses --</option>
                                        <option value="super_admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <div class="form-check form-check-lg d-flex align-items-end">
                                        <input class="form-check-input me-2" type="checkbox" name="is_active"
                                            value="active" id="is_active" checked>
                                        <label class="form-check-label text-gray-600" for="is_active">
                                            Aktifkan User
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
