<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->currentTeam != null;
    }

    public function view(User $user, Plan $plan)
    {
        return $user->currentTeam->id === $plan->team_id;
    }

    public function create(User $user)
    {
        return $user->currentTeam != null;
    }

    public function update(User $user, Plan $plan)
    {
        return $user->currentTeam->id === $plan->team_id;
    }

    public function delete(User $user, Plan $plan)
    {
        return $user->currentTeam->id === $plan->team_id;
    }
}