<?php

namespace App\Services\Domain;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Collection;

class DomainQueryService
{
    public function findDomainById(string $id): ?Domain
    {
        $query = Domain::query();
        $query->where('id', $id);
        $user = $query->first();

        return $user;
    }

    public function getAllDomain(bool $isActiveOnly = false): Collection
    {
        $query = Domain::query();
        $query->select(['id', 'name', 'code', 'is_active', 'created_at']);

        if ($isActiveOnly) {
            $query->where('is_active', true);
        }

        return $query->orderBy('created_at', 'ASC')->get();
    }
}
