<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Services\User\UserCommandService;
use App\Services\User\UserQueryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

final class UserController extends Controller
{
    // Constructor
    public function __construct(
        private readonly UserCommandService $userCommandService,
        private readonly UserQueryService $userQueryService
    ) {}

    public function index(Request $request): View
    {
        // Mendapatkan semua user
        $getAllUser = $this->userQueryService->getAllUser();

        // Return View
        return view('admin.pages.user.index', compact('getAllUser'));
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Simpan data user
            $data = $this->userCommandService->storeUser(request: $request);

            DB::commit();

            // Redirect
            return to_route('admin.master-data.user.index')->with('success', trans('response.success.store', ['data' => 'User']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.user.index')->with('error', $th->getMessage());
        }
    }

    public function update(UserUpdateRequest $request, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Cari user
            $user = $this->userQueryService->findUserById(id: $id);

            // Cek apakah user ada
            if (! isset($user)) {
                throw new Exception(trans('response.error.update', ['data' => 'User', 'error' => 'data tidak ditemukan']));
            }

            // Update user
            $this->userCommandService->updateUser(request: $request, user: $user);
            DB::commit();

            // Return
            return to_route('admin.master-data.user.index')->with('success', trans('response.success.update', ['data' => 'User']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.user.index')->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();
            // Mendapatkan user
            $user = $this->userQueryService->findUserById(id: $id);
            // Cek apakah ada
            if (! isset($user)) {
                throw new Exception(trans('response.error.delete', ['data' => 'User', 'error' => 'data tidak ditemukan']));
            }

            // Cek apakah aktif
            if ($user->is_active) {
                throw new Exception(trans('response.error.delete', ['data' => 'User', 'error' => 'user masih aktif']));
            }

            // Hapus user
            $this->userCommandService->deleteUser(user: $user);
            DB::commit();

            // Redirect
            return to_route('admin.master-data.user.index')->with('success', trans('response.success.delete', ['data' => 'User']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.user.index')->with('error', $th->getMessage());
        }
    }

    public function setStatus(Request $request, string $id): RedirectResponse
    {
        // Transactional
        try {
            DB::beginTransaction();

            // Cari user
            $user = $this->userQueryService->findUserById(id: $id);

            // Cek apakah user ada
            if (! isset($user)) {
                throw new Exception(trans('response.error.update', ['data' => 'User', 'error' => 'data tidak ditemukan']));
            }

            // Ubah status user
            $this->userCommandService->setStatus(user: $user);
            DB::commit();

            return to_route('admin.master-data.user.index')->with('success', trans('response.success.switch', ['data' => 'Perubahan status user']));
        } catch (Throwable $th) {
            DB::rollBack();

            return to_route('admin.master-data.user.index')->with('error', $th->getMessage());
        }
    }
}
