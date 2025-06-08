<div class="modal fade text-left" id="modalEditUser-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modalEditUser">
                    <h5>
                        Ubah User - {{ $item->name }}
                    </h5>
                    <small class="text-danger text-sm">* Wajib diisi</small>
                </div>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-horizontal" action="{{ route('admin.master-data.user.update', $item->id) }}"
                method="POST">
                @csrf
                @method('PATCH')
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
                                                placeholder="Email User" name="email"
                                                value="{{ $item->email ?? null }}">
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
                                                placeholder="Nama User" name="name"
                                                value="{{ $item->name ?? null }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label>Password</label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" autocomplete="new-password"
                                                placeholder="Password" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label>Konfirmasi Password</label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Konfirmasi Password" name="password_confirmation"
                                                autocomplete="new-password" placeholder="Password" />
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
                                        <option value="super_admin" {{ $item->is_super_admin ? 'selected' : '' }}>Super
                                            Admin</option>
                                        <option value="admin" {{ !$item->is_super_admin ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mt-4">
                                    <div class="form-check form-check-lg d-flex align-items-end">
                                        <input class="form-check-input me-2" type="checkbox" name="is_active"
                                            value="active" id="is_active-{{ $item->id }}"
                                            {{ $item->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label text-gray-600"
                                            for="is_active-{{ $item->id }}">
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
