<?php

namespace App\Services\BidangPraktik;

use App\Http\Requests\Admin\BidangPraktik\BidangPraktikStoreRequest;
use App\Http\Requests\Admin\BidangPraktik\BidangPraktikUpdateRequest;
use App\Models\BidangPraktik;

class BidangPraktikCommandService
{
    public function storeBidangPraktik(BidangPraktikStoreRequest $request): ?BidangPraktik
    {
        $bidangPraktik = new BidangPraktik;
        $bidangPraktik->bidang_kapabilitas_id = $request->bidang_kapabilitas_id;
        $bidangPraktik->code = $request->code;
        $bidangPraktik->name = $request->name;
        $bidangPraktik->is_active = isset($request->is_active) ? true : false;
        $bidangPraktik->save();

        return $bidangPraktik;
    }

    public function updateBidangPraktik(BidangPraktikUpdateRequest $request, BidangPraktik $bidangPraktik): ?BidangPraktik
    {
        $bidangPraktik->bidang_kapabilitas_id = $request->bidang_kapabilitas_id;
        $bidangPraktik->code = $request->code;
        $bidangPraktik->name = $request->name;
        $bidangPraktik->is_active = isset($request->is_active) ? true : false;
        $bidangPraktik->save();

        return $bidangPraktik;
    }

    public function deleteBidangPraktik(BidangPraktik $bidangPraktik): bool
    {
        return $bidangPraktik->delete();
    }

    public function setStatus(BidangPraktik $bidangPraktik): bool
    {
        return $bidangPraktik->update(['is_active' => $bidangPraktik->is_active ? false : true]);
    }
}
