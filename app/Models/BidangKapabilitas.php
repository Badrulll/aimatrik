<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BidangKapabilitas extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain_id', 'id');
    }

    public function bidangPraktik(): HasMany
    {
        return $this->hasMany(BidangPraktik::class, 'bidang_kapabilitas_id', 'id');
    }

    public function questionAnswerBidKapabilitas(): HasMany
    {
        return $this->hasMany(QuestionAnswerBidKapabilitas::class, 'bidang_kapabilitas_id', 'id');
    }
}
