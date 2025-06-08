<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserQueryService
{
    public function findUserById(string $id, bool $checkPrimaryAccount = true, ?bool $is_primary_account = false): ?User
    {
        $query = User::query();
        $query->where('id', $id);

        if ($checkPrimaryAccount) {
            $query->where('is_primary_account', $is_primary_account);
        }

        $user = $query->first();

        return $user;
    }

    public function getAllUser(): Collection
    {
        return User::select(['id', 'username', 'name', 'email', 'is_super_admin', 'is_primary_account', 'is_active', 'created_at'])->orderBy('created_at', 'ASC')->get();
    }
}
