<?php

namespace App\Services\BidangPraktik;

use App\Models\BidangPraktik;
use Illuminate\Database\Eloquent\Collection;

class BidangPraktikQueryService
{
    public function findBidangPraktikById(string $id): ?BidangPraktik
    {
        $query = BidangPraktik::query();
        $query->where('id', $id);
        $user = $query->first();

        return $user;
    }

    public function getAllBidangPraktik(string $id_bidang_kapabilitas): Collection
    {
        return BidangPraktik::select(['id', 'code', 'name', 'is_active', 'created_at'])->where('bidang_kapabilitas_id', $id_bidang_kapabilitas)->orderBy('created_at', 'ASC')->get();
    }
}
