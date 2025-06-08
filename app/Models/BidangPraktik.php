<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BidangPraktik extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function bidangKapabilitas(): BelongsTo
    {
        return $this->belongsTo(BidangKapabilitas::class, 'bidang_kapabilitas_id', 'id');
    }

    public function praktik(): HasMany
    {
        return $this->hasMany(Praktik::class, 'bidang_praktik_id', 'id');
    }

    public function questionAnswerBidPraktik(): HasMany
    {
        return $this->hasMany(QuestionAnswerBidPraktik::class, 'bidang_praktik_id', 'id');
    }
}
