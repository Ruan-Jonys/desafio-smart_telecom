<?php

namespace App\Policies;

use App\Models\Plano;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->currentTeam != null;
    }

    public function view(User $user, Plano $plano)
    {
        return $user->currentTeam->id === $plano->team_id;
    }

    public function create(User $user)
    {
        return $user->currentTeam != null;
    }

    public function update(User $user, Plano $plano)
    {
        return $user->currentTeam->id === $plano->team_id;
    }

    public function delete(User $user, Plano $plano)
    {
        return $user->currentTeam->id === $plano->team_id;
    }
}