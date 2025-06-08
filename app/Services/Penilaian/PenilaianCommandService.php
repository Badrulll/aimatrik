<?php

namespace App\Services\Penilaian;

use App\Models\QuestionAnswerBidPraktik;
use App\Models\QuestionAnswerPraktik;

class PenilaianCommandService
{
    public function storePenilaianAnswerPraktik(QuestionAnswerPraktik $questionAnswerPraktik, ?string $value = null, ?string $catatan = null): QuestionAnswerPraktik
    {
        $questionAnswerPraktik->answer = $value;
        $questionAnswerPraktik->description = $catatan;
        $questionAnswerPraktik->save();

        return $questionAnswerPraktik;
    }

    public function storePenilaianBidangPraktik(QuestionAnswerBidPraktik $questionAnswerBidPraktik, ?string $levelTarget = null): QuestionAnswerBidPraktik
    {
        $questionAnswerBidPraktik->level_target = $levelTarget;
        $questionAnswerBidPraktik->save();

        return $questionAnswerBidPraktik;
    }
}
