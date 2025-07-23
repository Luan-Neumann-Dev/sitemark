<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class DashboardController
{

    /**
     * @return View
     */
    public function __invoke(): View
    {
        /** @var User $user */
        $user = auth()->user();

        $links = $user->links;

        return view('dashboard', compact('links'));
    }
}
