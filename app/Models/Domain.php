<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function bidangKapabilitas(): HasMany
    {
        return $this->hasMany(BidangKapabilitas::class, 'domain_id', 'id');
    }

    public function daftarPenilaianQuestion(): HasMany
    {
        return $this->hasMany(DaftarPenilaianQuestion::class, 'domain_id', 'id');
    }
}
