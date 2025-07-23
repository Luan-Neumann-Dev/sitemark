<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;

class LogoutController
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        auth()->logout();
        session()->invalidate();
        return to_route('login');
    }
}
