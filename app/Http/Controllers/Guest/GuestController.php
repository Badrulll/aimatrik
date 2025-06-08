<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Services\DaftarPenilaian\DaftarPenilaianCommandService;
use App\Services\DaftarPenilaian\DaftarPenilaianQueryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class GuestController extends Controller
{
    // Constructor
    public function __construct(
        private readonly DaftarPenilaianCommandService $daftarPenilaianCommandService,
        private readonly DaftarPenilaianQueryService $daftarPenilaianQueryService,
    ) {}

    public function index(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return to_route('admin.home.index');
        }

        return view('guest.pages.home.index');
    }
}
