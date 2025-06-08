<?php

namespace App\Services\BidangKapabilitas;

use App\Models\BidangKapabilitas;
use Illuminate\Database\Eloquent\Collection;

class BidangKapabilitasQueryService
{
    public function findBidangKapabilitasById(string $id): ?BidangKapabilitas
    {
        $query = BidangKapabilitas::query();
        $query->where('id', $id);
        $user = $query->first();

        return $user;
    }

    public function getAllBidangKapabilitas(string $id_domain): Collection
    {
        return BidangKapabilitas::select(['id', 'code', 'name', 'is_active', 'created_at'])->where('domain_id', $id_domain)->orderBy('created_at', 'ASC')->get();
    }
}
