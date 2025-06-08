<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarPenilaianQuestion extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [];

    public function daftarPenilaian(): BelongsTo
    {
        return $this->belongsTo(DaftarPenilaian::class, 'daftar_penilaian_id', 'id');
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class, 'domain_id', 'id');
    }

    public function questionAnswerBidKapabilitas(): HasMany
    {
        return $this->hasMany(QuestionAnswerBidKapabilitas::class, 'daftar_penilaian_question_id', 'id');
    }
}
