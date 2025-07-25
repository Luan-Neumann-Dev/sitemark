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

        $data = $request->validated();

        if($file = $request->file('photo')) {
            $data['photo'] = $file->store('photos');
        }

        $user->update($data);

        return back()->with('message', 'Perfil atualizado com sucesso!');
    }
}
