<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class AccountDisabledController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        // Cek apakah user tidak login atau user aktif, jika iya maka redirect ke halaman home
        if (! Auth::check() || Auth::user()->is_active) {
            return to_route('admin.home.index');
        }

        // Jika tidak berarti akunnya harus didisabled
        return view('errors.disable-account');
    }
}
