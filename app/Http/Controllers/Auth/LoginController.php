<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{

    /**
     * @return View
     */
    public function index(): View {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse {
        if ($request->login()) {
            return to_route('dashboard');
        }

        return back()->with(['message'=>"Não foi possível realizar o login!"]);
    }
}
