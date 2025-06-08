<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswerPraktik extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [];

    public function questionAnswerBidPraktik(): BelongsTo
    {
        return $this->belongsTo(QuestionAnswerBidPraktik::class, 'question_answer_bid_praktik_id', 'id');
    }

    public function praktik(): BelongsTo
    {
        return $this->belongsTo(Praktik::class, 'praktik_id', 'id');
    }
}
