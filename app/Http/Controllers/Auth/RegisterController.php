<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * @return View
     */
    public function index(): View {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse {
        if($request->register()){
            return to_route('dashboard');
        }

        return back()->with(['message' => "Não foi possível realizar o cadastro."]);
    }
}
