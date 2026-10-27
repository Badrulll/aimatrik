@extends('admin.layouts.app')

@section('title', 'Pengaturan - Profil')

@section('customJs')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById("file-upload");
            const chooseButton = document.getElementById("lfm1");
            const filenameInput = document.getElementById("filename");
            const previewImage = document.querySelector("#holder1 .preview-image img");

            chooseButton.addEventListener("click", function(event) {
                event.preventDefault();
                fileInput.click();
            });

            fileInput.addEventListener("change", function() {
                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(fileInput.files[0]);

                    // Tampilkan nama file di input teks
                    filenameInput.value = fileInput.files[0].name;
                }
            });
        });
    </script>
@endsection

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengaturan - Profil</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-subtitle"><a href="{{ route('admin.setting.profile.index') }}" style="color: #e60012;">Pengaturan</a></li>
                            <li class="breadcrumb-item active text-subtitle" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            @include('admin.pages.setting.tab._setting_tab')
            @include('generals._validation')

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <section id="basic-horizontal-layouts">
                                <div id="holder1" class="preview-images-zone row text-center">
                                    <div class="preview-image col-12 col-md-12" style="max-width: 100%">
                                        <img loading="lazy" width="100%" class="img img-responsive rounded-3 shadow-sm"
                                            src="{{ isset($userProfileImage) ? asset('storage/' . $userProfileImage) : 'https://ui-avatars.com/api/?name=' . Auth::user()->username . '&background=e60012&color=fff' }}" />
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            {{-- Header opsional jika ingin ditambahkan styling --}}
                        </div>
                        <div class="card-body">
                            <section id="basic-horizontal-layouts">
                                <form class="form form-horizontal" enctype="multipart/form-data"
                                    action="{{ route('admin.setting.profile.update') }}" method="post">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label font-weight-bold">Foto Profil</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm1" class="btn text-white" style="background-color: #e60012; border-color: #e60012;">
                                                            <i class="bi bi-image"></i> Pilih Gambar
                                                        </a>
                                                    </span>
                                                    <input id="filename" type="text" class="form-control" readonly
                                                        placeholder="Belum ada file dipilih">
                                                    <input id="file-upload" type="file" name="image"
                                                        accept=".jpg,.jpeg,.png,.gif,.svg,.webp" style="display: none;">
                                                </div>
                                                <small class="text-muted">Maksimal 2MB dengan format: jpg, jpeg, png, gif, svg, webp</small>
                                            </div>

                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Username<span class="text-danger">*</span></label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" disabled class="form-control" required
                                                            placeholder="Kantor"
                                                            value="{{ Auth::user()->username ?? null }}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-key" style="color: #e60012;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Nama<span class="text-danger">*</span></label>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            required placeholder="Nama" name="name"
                                                            value="{{ Auth::user()->name }}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person" style="color: #e60012;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-sm text-white me-1 mb-1 shadow-sm" style="background-color: #e60012; border-color: #e60012;">
                                                    Simpan Data
                                                </button>
                                                <button type="reset"
                                                    class="btn btn-sm btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection