<?php

namespace App\Services\Praktik;

use App\Http\Requests\Admin\Praktik\PraktikStoreRequest;
use App\Http\Requests\Admin\Praktik\PraktikUpdateRequest;
use App\Models\Praktik;

class PraktikCommandService
{
    public function storePraktik(PraktikStoreRequest $request): ?Praktik
    {
        $praktik = new Praktik;
        $praktik->bidang_praktik_id = $request->bidang_praktik_id;
        $praktik->praktik = $request->praktik;
        $praktik->kategori_level = (int) $request->kategori_level;
        $praktik->is_active = isset($request->is_active) ? true : false;
        $praktik->save();

        return $praktik;
    }

    public function updatePraktik(PraktikUpdateRequest $request, Praktik $praktik): ?Praktik
    {
        $praktik->bidang_praktik_id = $request->bidang_praktik_id;
        $praktik->praktik = $request->praktik;
        $praktik->kategori_level = (int) $request->kategori_level;
        $praktik->is_active = isset($request->is_active) ? true : false;
        $praktik->save();

        return $praktik;
    }

    public function deletePraktik(Praktik $praktik): bool
    {
        return $praktik->delete();
    }

    public function setStatus(Praktik $praktik): bool
    {
        return $praktik->update(['is_active' => $praktik->is_active ? false : true]);
    }
}
