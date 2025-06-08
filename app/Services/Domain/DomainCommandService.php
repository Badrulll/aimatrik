<?php

namespace App\Services\Domain;

use App\Http\Requests\Admin\Domain\DomainStoreRequest;
use App\Http\Requests\Admin\Domain\DomainUpdateRequest;
use App\Models\Domain;

class DomainCommandService
{
    public function storeDomain(DomainStoreRequest $request): ?Domain
    {
        $domain = new Domain;
        $domain->code = $request->code;
        $domain->name = $request->name;
        $domain->is_active = isset($request->is_active) ? true : false;
        $domain->save();

        return $domain;
    }

    public function updateDomain(DomainUpdateRequest $request, Domain $domain): ?Domain
    {
        $domain->code = $request->code;
        $domain->name = $request->name;
        $domain->is_active = isset($request->is_active) ? true : false;
        $domain->save();

        return $domain;
    }

    public function deleteDomain(Domain $domain): bool
    {
        return $domain->delete();
    }

    public function setStatus(Domain $domain): bool
    {
        return $domain->update(['is_active' => $domain->is_active ? false : true]);
    }
}
