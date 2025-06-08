<?php

namespace App\Services\Praktik;

use App\Models\Praktik;
use Illuminate\Database\Eloquent\Collection;

class PraktikQueryService
{
    public function findPraktikById(string $id): ?Praktik
    {
        $query = Praktik::query();
        $query->where('id', $id);
        $user = $query->first();

        return $user;
    }

    public function getAllPraktik(string $id_bidang_praktik): Collection
    {
        return Praktik::select(['id', 'praktik', 'kategori_level', 'is_active', 'created_at'])->where('bidang_praktik_id', $id_bidang_praktik)->orderBy('kategori_level', 'ASC')->orderBy('created_at', 'ASC')->get();
    }
}
