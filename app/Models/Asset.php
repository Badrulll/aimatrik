<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Asset extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [
        'asset_id',
        'asset_type',
        'id',
    ];

    protected $hidden = [
        'asset_id',
        'asset_type',
        'asset_key',
        'is_image',
    ];

    public function image(): MorphTo
    {
        return $this->morphTo();
    }
}
