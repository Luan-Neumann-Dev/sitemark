<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\ProfileRequest;

class ProfileController
{

    public function index()
    {
        return view('user.profile',[
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileRequest $request) {
        $user = auth()->user();

        $user->update($request->validated());

        return back()->with('message', 'Perfil atualizado com sucesso!');
    }
}
