<?php

namespace App\Policies;

use App\Models\Knowledge;
use App\Models\User;

class KnowledgePolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Knowledge $knowledge): bool
    {
        return $user->id === $knowledge->user->id;
    }

    public function delete(User $user, Knowledge $knowledge): bool
    {
        return $user->id === $knowledge->user->id;
    }
}
