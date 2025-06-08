<?php

namespace App\Services\DaftarPenilaian;

use App\Models\DaftarPenilaian;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DaftarPenilaianQueryService
{
    public function findDaftarPenilaianById(string $id): ?DaftarPenilaian
    {
        $query = DaftarPenilaian::query();
        $query->where('id', $id);
        $query->where('user_id', Auth::user()->id);
        $user = $query->first();

        return $user;
    }

    public function getAllDaftarPenilaian(bool $withPaginate = false, bool $isPublishOnly = false, bool $isActiveOnly = false): Collection|LengthAwarePaginator
    {
        $query = DaftarPenilaian::query();
        $query->select(['id', 'name', 'description', 'is_active', 'is_publish', 'created_at']);
        $query->where('user_id', Auth::user()->id);
        $query->orderBy('created_at', 'ASC');

        if ($isActiveOnly) {
            $query->where('is_active', true);
        }

        if ($isPublishOnly) {
            $query->where('is_publish', true);
        }

        if ($withPaginate) {
            return $query->paginate(10);
        }

        return $query->get();
    }
}
