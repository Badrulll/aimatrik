@extends('admin.layouts.app')

@section('title', 'Manajemen Penilaian - Data Penilaian')

@section('customCss')
    <style>
        .select2-container--default .select2-selection--single {
            height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
        }
    </style>
@endsection

@section('customJs')
    @include('admin.pages.penilaian.js._index_js')
@endsection

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Penilaian - Data Penilaian</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-subtitle"><a
                                    href="{{ route('admin.daftar-penilaian.index') }}">Manajemen
                                    Penilaian</a>
                            </li>
                            <li class="breadcrumb-item active text-subtitle" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body pt-3 pb-2">
                            <div class="row justify-content-between  g-2">
                                <div class="col-auto">
                                    <h6 class="py-0">{{ $findDaftarPenilaian->name }}
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <form
                                        action="{{ route('admin.daftar-penilaian.penilaian.setStatusPenilaian', ['id_daftar_penilaian' => $findDaftarPenilaian->id]) }}"
                                        method="post">
                                        @csrf
                                        <a href="{{ route('admin.daftar-penilaian.penilaian.index', ['id_daftar_penilaian' => $findDaftarPenilaian->id]) }}"
                                            class="btn btn-secondary btn-sm reload">
                                            <i class="bi bi-arrow-clockwise"></i>
                                            Refresh
                                        </a>
                                        <a href="{{ route('admin.daftar-penilaian.index') }}"
                                            class="btn btn-outline-dark btn-sm reload">
                                            <i class="bi bi-arrow-left"></i>
                                            Kembali
                                        </a>

                                        @if (!$findDaftarPenilaian->is_publish)
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="bi bi-upload"></i>
                                                Publish Penilaian
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-download"></i>
                                                Unpublish Penilaian
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($findDaftarPenilaian->is_publish)
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-start mb-2">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                <div>
                                    <strong>Perhatian:</strong>
                                </div>
                            </div>
                            <hr>
                            <ul style="padding-left: 1.5rem; margin-bottom: 0; list-style-type: none">
                                <li>
                                    <small>
                                        Data Penilaian sudah dipublish, silahkan unpublish terlebih dahulu untuk melakukan
                                        perubahan</small>
                                </li>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>
                @endif
                @include('admin.pages.penilaian.tab._penilaian_tab')
                <div class="col-12">
                    @include('generals._validation')
                    <div class="row">
                        @forelse ($getAllQuestion->sortBy('id')->values() as $index=>$itemQuestion)
                            @include('admin.pages.penilaian.tab._bidang_kapabilitas_tab')
                            <div class="col-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <div class="d-flex align-items-start mb-2">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        <div>
                                            <strong>Perhatian:</strong>
                                        </div>
                                    </div>
                                    <hr>
                                    <ul style="padding-left: 1.5rem; margin-bottom: 0; list-style-type: none">
                                        <li>
                                            <i class="bi bi-filter-left"></i><small> <span class="text-danger">*</span>
                                                Wajib
                                                diisi</small>
                                        </li>
                                        <li>
                                            <i class="bi bi-filter-left"></i><small> <span class="text-danger">**</span>
                                                Mendukung lebih dari 1 file
                                                dengan
                                                format: .png, .jpg, .jpeg, .pdf, .doc, .docx</small>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            @include('admin.pages.penilaian.question._question_master')
                        @empty
                            <!-- Jika tidak ada data, tampilkan gambar default -->
                            <div class="col-12 text-center">
                                <img src="{{ asset('assets/images/default/empty-default.png') }}" alt="Data Kosong"
                                    class="img-fluid" width="300">
                                <h5 class="mt-3">Belum ada data yang tersedia</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.pages.penilaian.modal._input_level_target_modal')
    @include('admin.pages.penilaian.modal._preview_image_modal')
@endsection
