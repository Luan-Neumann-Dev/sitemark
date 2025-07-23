<?php

namespace App\Http\Controllers\Link;

use App\Http\Requests\Link\StoreLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LinkController
{
    /**
     * Show the form for creating a new Link.
     * @return View
     */
    public function create(): View
    {
        return view('links.create');
    }

    /**
     * Store a newly created Link in storage.
     *
     * @param StoreLinkRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLinkRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->links()
            ->create($request->validated());

        return to_route('dashboard');
    }

    /**
     * Show the form for editing the Link.
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified Link in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->fill($request->validated())->save();

        return to_route('dashboard')->with('message', 'Link atualizado com sucesso!');
    }

    /**
     * Remove the Link from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
