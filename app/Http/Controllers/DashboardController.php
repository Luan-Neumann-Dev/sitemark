<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController
{

    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('dashboard');
    }
}
