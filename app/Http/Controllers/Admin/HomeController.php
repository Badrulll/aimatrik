<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DaftarPenilaian\DaftarPenilaianCommandService;
use App\Services\DaftarPenilaian\DaftarPenilaianQueryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class HomeController extends Controller
{
    // Constructor
    public function __construct(
        private readonly DaftarPenilaianCommandService $daftarPenilaianCommandService,
        private readonly DaftarPenilaianQueryService $daftarPenilaianQueryService,
    ) {}

    public function index(Request $request): View
    {
        // Mendapatkan semua daftar penilaian yang telah dipublish dan aktif
        $getAllDaftarPenilaian = $this->daftarPenilaianQueryService->getAllDaftarPenilaian(withPaginate: true, isPublishOnly: true, isActiveOnly: true);

        // Menampilkan halaman utama
        return view('admin.pages.home.index', compact('getAllDaftarPenilaian'));
    }
}
