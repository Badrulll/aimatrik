<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswerBidKapabilitas extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [];

    public function daftarPenilaianQuestion(): BelongsTo
    {
        return $this->belongsTo(DaftarPenilaianQuestion::class, 'daftar_penilaian_question_id', 'id');
    }

    public function questionAnswerBidPraktik(): HasMany
    {
        return $this->hasMany(QuestionAnswerBidPraktik::class, 'question_answer_bid_kapabilitas_id', 'id');
    }

    public function bidangKapabilitas(): BelongsTo
    {
        return $this->belongsTo(BidangKapabilitas::class, 'bidang_kapabilitas_id', 'id');
    }
}
