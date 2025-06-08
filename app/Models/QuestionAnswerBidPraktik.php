<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswerBidPraktik extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [];

    public function questionAnswerBidKapabilitas(): BelongsTo
    {
        return $this->belongsTo(QuestionAnswerBidKapabilitas::class, 'question_answer_bid_kapabilitas_id', 'id');
    }

    public function questionAnswerPraktik(): HasMany
    {
        return $this->hasMany(QuestionAnswerPraktik::class, 'question_answer_bid_praktik_id', 'id');
    }

    public function bidangPraktik(): BelongsTo
    {
        return $this->belongsTo(BidangPraktik::class, 'bidang_praktik_id', 'id');
    }
}
