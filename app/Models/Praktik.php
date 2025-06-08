<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Praktik extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function bidangPraktik(): BelongsTo
    {
        return $this->belongsTo(BidangPraktik::class, 'bidang_praktik_id', 'id');
    }

    public function questionAnswerPraktik(): HasMany
    {
        return $this->hasMany(QuestionAnswerPraktik::class, 'praktik_id', 'id');
    }
}
