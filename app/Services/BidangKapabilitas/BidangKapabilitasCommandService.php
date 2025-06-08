<?php

namespace App\Services\BidangKapabilitas;

use App\Http\Requests\Admin\BidangKapabilitas\BidangKapabilitasStoreRequest;
use App\Http\Requests\Admin\BidangKapabilitas\BidangKapabilitasUpdateRequest;
use App\Models\BidangKapabilitas;

class BidangKapabilitasCommandService
{
    public function storeBidangKapabilitas(BidangKapabilitasStoreRequest $request): ?BidangKapabilitas
    {
        $bidangKapabilitas = new BidangKapabilitas;
        $bidangKapabilitas->domain_id = $request->domain_id;
        $bidangKapabilitas->name = $request->name;
        $bidangKapabilitas->code = $request->code;
        $bidangKapabilitas->is_active = isset($request->is_active) ? true : false;
        $bidangKapabilitas->save();

        return $bidangKapabilitas;
    }

    public function updateBidangKapabilitas(BidangKapabilitasUpdateRequest $request, BidangKapabilitas $bidangKapabilitas): ?BidangKapabilitas
    {
        $bidangKapabilitas->domain_id = $request->domain_id;
        $bidangKapabilitas->name = $request->name;
        $bidangKapabilitas->code = $request->code;
        $bidangKapabilitas->is_active = isset($request->is_active) ? true : false;
        $bidangKapabilitas->save();

        return $bidangKapabilitas;
    }

    public function deleteBidangKapabilitas(BidangKapabilitas $bidangKapabilitas): bool
    {
        return $bidangKapabilitas->delete();
    }

    public function setStatus(BidangKapabilitas $bidangKapabilitas): bool
    {
        return $bidangKapabilitas->update(['is_active' => $bidangKapabilitas->is_active ? false : true]);
    }
}
