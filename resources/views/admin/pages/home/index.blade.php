@extends('admin.layouts.app')

@section('title', 'Dashboard - Rekapan Penilaian')

@section('customJs')

@endsection

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard - Rekapan Penilaian</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-subtitle"><a
                                    href="{{ route('admin.daftar-penilaian.index') }}">Dashboard</a>
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
                                    <h6 class="py-0">Tota Daftar Penilaian (<span
                                            id="domain-total"><small>{{ $getAllDaftarPenilaian->count() }}</small></span>)
                                        |
                                        Aktif (<span
                                            id="active-total"><small>{{ $getAllDaftarPenilaian->where('is_active', true)->count() }}</small></span>)
                                        |
                                        Nonaktif (<span
                                            id="inactive-total"><small>{{ $getAllDaftarPenilaian->where('is_active', false)->count() }}</small></span>)
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    Silahkan aktifkan dan publish penilaian terlebih dahulu agar dapat melihat hasil rekapan
                                    penilaian</small>
                            </li>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
                <div class="col-12">
                    @include('generals._validation')
                    <div class="row">
                        @forelse ($getAllDaftarPenilaian as $index => $item)
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            {{ \Illuminate\Support\Str::limit($item->name, 20, '...') }}</h4>
                                        <div class="row justify-content-between   g-2">
                                            <div class="col-auto">
                                                <small>
                                                    {{ $item->created_at->format('d M Y') }}
                                                </small>
                                            </div>
                                            <div class="col-auto">
                                                <small>
                                                    <span
                                                        class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">{{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                    <span
                                                        class="badge bg-{{ $item->is_publish ? 'success' : 'danger' }}">{{ $item->is_publish ? 'Publish' : 'Draft' }}</span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{ \Illuminate\Support\Str::limit($item->description, 40, '...') }}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-12">
                                            <a href="{{ route('admin.home.rekapan.index', $item->id) }}"
                                                class="btn btn-success btn-sm col-12"><i class="bi bi-files"></i>
                                                Lihat Rekapan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Jika tidak ada data, tampilkan gambar default -->
                            <div class="col-12 text-center">
                                <img src="{{ asset('assets/images/default/empty-default.png') }}" alt="Data Kosong"
                                    class="img-fluid" width="300">
                                <h5 class="mt-3">Belum ada data yang tersedia</h5>
                            </div>
                        @endforelse

                        <!-- Tambahkan pagination di bawah -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $getAllDaftarPenilaian->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
