@extends('admin.layouts.app')

@section('title', 'Manajemen Penilaian - Data Penilaian')

@section('customJs')

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
                                    <h6 class="py-0">Total Daftar Penilaian (<span
                                            id="domain-total"><small>{{ $getAllDaftarPenilaian->count() }}</small></span>)
                                        |
                                        Aktif (<span
                                            id="active-total"><small>{{ $getAllDaftarPenilaian->where('is_active', true)->count() }}</small></span>)
                                        |
                                        Nonaktif (<span
                                            id="inactive-total"><small>{{ $getAllDaftarPenilaian->where('is_active', false)->count() }}</small></span>)
                                    </h6>
                                </div>
                                <div class="col-auto"> <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#modalCreateDaftarPenilaian"
                                        class="btn btn-primary btn-sm icon-left">
                                        <i class="bi bi-send-plus"></i> Tambah
                                        Data</a>
                                </div>
                            </div>
                        </div>
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
                                        <form id="delete-{{ $item->id }}"
                                            action="{{ route('admin.daftar-penilaian.delete', ['id' => $item->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="javascript:void(0)"
                                                        data-bs-target="#modalEditDaftarPenilaian-{{ $item->id }}"
                                                        data-bs-toggle="modal" class="btn btn-primary btn-sm col-12"
                                                        title="Ubah Data">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </div>
                                                <div class="col-2">
                                                    <button onclick="alertConfirm(this)" data-id="{{ $item->id }}"
                                                        type="button" class="btn btn-danger btn-sm col-12"
                                                        title="Hapus Data">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                </div>
                                                <div class="col-8">
                                                    <a href="{{ route('admin.daftar-penilaian.penilaian.index', $item->id) }}"
                                                        class="btn btn-success btn-sm col-12"><i
                                                            class="bi bi-send-plus"></i> Nilai Sekarang</a>
                                                </div>
                                            </div>
                                        </form>
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

    {{-- Modal --}}
    @include('admin.pages.daftar-penilaian._create_modal')
    @foreach ($getAllDaftarPenilaian as $index => $item)
        @include('admin.pages.daftar-penilaian._edit_modal')
    @endforeach
@endsection
