@extends('admin.layouts.app')

@section('title', 'Manajemen Bidang Kapabilitas - Data Bidang Kapabilitas')

@section('customJs')
    <script>
        var JSPageScriptCustom = function() {
            // Private functions

            var initDataTable = function() {
                var table = $('#dataTable');

                // begin first table
                table.DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],

                    pageLength: 10,

                    language: {
                        "lengthMenu": "Tampilkan _MENU_",
                        "zeroRecords": "Tidak ada yang ditemukan - maaf",
                        "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        "search": "Cari:",
                        "infoEmpty": "Tidak ada data yang tersedia",
                        "infoFiltered": "(difilter dari total _MAX_ data)"
                    },

                    // Order settings
                    order: [
                        // [1, 'asc']
                    ],
                    dom: "<'row'<'col-md-3 col-sm-12 custom_btn'l><'col-md-6 col-sm-12'><'col-md-3 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12 dataTables_pager'p>>", // horizobtal scrollable datatable
                });
            };


            return {
                // Public functions
                init: function() {
                    // init dmeo
                    initDataTable();
                },
            };
        }();
        jQuery(document).ready(function() {
            JSPageScriptCustom.init();
        });
    </script>
@endsection

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Bidang Kapabilitas - {{ \Illuminate\Support\Str::limit($findDomain->name, 20, '...') }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-subtitle"><a
                                    href="{{ route('admin.master-data.domain.index') }}">Manajemen
                                    Domain</a>
                            </li>
                            <li class="breadcrumb-item text-subtitle"><a
                                    href="{{ route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $findDomain->id]) }}">
                                    Bidang Kapabilitas</a>
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
                            <div class="row justify-content-between   g-2">
                                <div class="col-auto">
                                    <h6 class="py-0">Total Bidang Kapabilitas (<span
                                            id="bidang-kapabilitas-total"><small>{{ $getAllBidangKapabilitas->count() }}</small></span>)
                                        |
                                        Aktif (<span
                                            id="active-total"><small>{{ $getAllBidangKapabilitas->where('is_active', true)->count() }}</small></span>)
                                        |
                                        Nonaktif (<span
                                            id="inactive-total"><small>{{ $getAllBidangKapabilitas->where('is_active', false)->count() }}</small></span>)
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <a
                                        href="{{ route('admin.master-data.domain.bidang-kapabilitas.index', ['id_domain' => $findDomain->id]) }}"><button
                                            class="btn btn-secondary btn-sm reload"><i class="bi bi-arrow-clockwise"></i>
                                            Refresh</button>
                                    </a>
                                    <a href="{{ route('admin.master-data.domain.index') }}"><button
                                            class="btn btn-danger btn-sm reload"><i class="bi bi-arrow-left"></i> Kembali
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    @include('generals._validation')
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between g-2">
                                <div class="col-auto">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#modalCreateBidangKapabilitas"
                                        class="btn btn-primary btn-sm icon-left">
                                        <i class="bi bi-send-plus"></i> Tambah
                                        Data</a>
                                </div>
                                <div class="col-auto">

                                </div>
                            </div>
                            <div class="d-flex d-inline-block ">

                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Kode Bidang Kapabilitas</th>
                                            <th>Nama Bidang Kapabilitas</th>
                                            <th>Status</th>
                                            <th>Diubah terakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getAllBidangKapabilitas as $index => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <form id="delete-{{ $item->id }}"
                                                        action="{{ route('admin.master-data.domain.bidang-kapabilitas.delete', ['id_domain' => $findDomain->id, 'id' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0)"
                                                                data-bs-target="#modalEditBidangKapabilitas-{{ $item->id }}"
                                                                data-bs-toggle="modal"
                                                                class="btn btn-primary btn-sm mx-1 mt-1" title="Ubah Data">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </a>
                                                            <a href="{{ route('admin.master-data.domain.bidang-kapabilitas.bidang-praktik.index', ['id_domain' => $findDomain->id, 'id_bidang_kapabilitas' => $item->id]) }}"
                                                                class="btn btn-warning btn-sm mx-1 mt-1 text-white"
                                                                title="Atur Kapabilitas">
                                                                <i class="bi bi-eye"></i>
                                                            </a>
                                                            <button onclick="alertConfirm(this)"
                                                                data-id="{{ $item->id }}" type="button"
                                                                class="btn btn-danger btn-sm ms-1 mt-1" title="Hapus Data">
                                                                <i class="bi bi-trash3-fill"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <form id="change-{{ $item->id }}"
                                                        action="{{ route('admin.master-data.domain.bidang-kapabilitas.set-status', ['id_domain' => $findDomain->id, 'id' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button onclick="changeStatus(this)" data-id="{{ $item->id }}"
                                                            type="button"
                                                            class="main-toggle changeStatus {{ $item->is_active ? 'on' : '' }}"
                                                            style="border: none">
                                                            <span></span>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d F Y H:i') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal --}}
    @include('admin.pages.bidang-kapabilitas._create_modal')
    @foreach ($getAllBidangKapabilitas as $index => $item)
        @include('admin.pages.bidang-kapabilitas._edit_modal')
    @endforeach
@endsection
