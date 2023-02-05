<?php

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChirpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User  $user
     * @param Chirp $chirp
     *
     * @return bool
     */
    public function update(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }
}
