<?php

namespace App\Services\DaftarPenilaian;

use App\Http\Requests\Admin\DaftarPenilaian\DaftarPenilaianStoreRequest;
use App\Http\Requests\Admin\DaftarPenilaian\DaftarPenilaianUpdateRequest;
use App\Models\DaftarPenilaian;
use App\Models\DaftarPenilaianQuestion;
use App\Models\QuestionAnswerBidKapabilitas;
use App\Models\QuestionAnswerBidPraktik;
use App\Models\QuestionAnswerPraktik;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DaftarPenilaianCommandService
{
    public function storeDaftarPenilaian(DaftarPenilaianStoreRequest $request): ?DaftarPenilaian
    {
        $daftarPenilaian = new DaftarPenilaian;
        $daftarPenilaian->user_id = Auth::user()->id;
        $daftarPenilaian->name = $request->name;
        $daftarPenilaian->description = $request->description;
        $daftarPenilaian->is_active = isset($request->is_active) ? true : false;
        $daftarPenilaian->save();

        return $daftarPenilaian;
    }

    public function storeDaftarPenilaianQuestion(DaftarPenilaian $daftarPenilaian, Collection $domain): bool
    {
        foreach ($domain as $domainItem) {
            $daftarPenilaianQuestion = new DaftarPenilaianQuestion;
            $daftarPenilaianQuestion->daftar_penilaian_id = $daftarPenilaian->id;
            $daftarPenilaianQuestion->domain_id = $domainItem->id;

            if (! $daftarPenilaianQuestion->save()) {
                return false;
            }

            foreach ($domainItem->bidangKapabilitas?->where('is_active', true)->sortBy('created_at') as $bidangKapabilitasItem) {
                $questionAnswerBidKapabilitas = new QuestionAnswerBidKapabilitas;
                $questionAnswerBidKapabilitas->daftar_penilaian_question_id = $daftarPenilaianQuestion->id;
                $questionAnswerBidKapabilitas->bidang_kapabilitas_id = $bidangKapabilitasItem->id;

                if (! $questionAnswerBidKapabilitas->save()) {
                    return false;
                }

                foreach ($bidangKapabilitasItem->bidangPraktik?->where('is_active', true)->sortBy('created_at') as $bidangPraktikItem) {
                    $questionAnswerBidPraktik = new QuestionAnswerBidPraktik;
                    $questionAnswerBidPraktik->question_answer_bid_kapabilitas_id = $questionAnswerBidKapabilitas->id;
                    $questionAnswerBidPraktik->bidang_praktik_id = $bidangPraktikItem->id;

                    if (! $questionAnswerBidPraktik->save()) {
                        return false;
                    }

                    foreach (
                        $bidangPraktikItem->praktik?->where('is_active', true)->sortBy([
                            ['kategori_level', 'asc'],
                            ['created_at', 'asc'],
                        ]) as $praktikItem
                    ) {
                        $questionAnswerPraktik = new QuestionAnswerPraktik;
                        $questionAnswerPraktik->question_answer_bid_praktik_id = $questionAnswerBidPraktik->id;
                        $questionAnswerPraktik->praktik_id = $praktikItem->id;

                        if (! $questionAnswerPraktik->save()) {
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

    public function updateDaftarPenilaian(DaftarPenilaianUpdateRequest $request, DaftarPenilaian $daftarPenilaian): ?DaftarPenilaian
    {
        $daftarPenilaian->name = $request->name;
        $daftarPenilaian->description = $request->description;
        $daftarPenilaian->is_active = isset($request->is_active) ? true : false;
        $daftarPenilaian->save();

        return $daftarPenilaian;
    }

    public function deleteDaftarPenilaian(DaftarPenilaian $daftarPenilaian): bool
    {
        $daftarPenilaian->daftarPenilaianQuestion()->delete();

        return $daftarPenilaian->delete();
    }

    public function setStatus(DaftarPenilaian $daftarPenilaian): bool
    {
        return $daftarPenilaian->update(['is_active' => $daftarPenilaian->is_active ? false : true]);
    }

    public function setStatusDaftarPenilaian(DaftarPenilaian $daftarPenilaian): bool
    {
        return $daftarPenilaian->update(['is_publish' => $daftarPenilaian->is_publish ? false : true]);
    }
}
