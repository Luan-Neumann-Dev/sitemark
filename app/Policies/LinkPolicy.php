<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    /**
     * @param User $user
     * @param Link $link
     * @return Response
     */
    public function update(User $user, Link $link): Response
    {
        return $link->user->is($user)
            ? Response::allow()
            : Response::deny("Este link não é seu!");
    }
}
