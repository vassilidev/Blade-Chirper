<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChirpRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ChirpRequest $request): RedirectResponse
    {
        $request->user()->chirps()->create($request->validated());

        return redirect(route('chirps.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Chirp $chirp
     *
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Chirp $chirp): View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChirpRequest $request
     * @param Chirp        $chirp
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(ChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        $chirp->update($request->validated());

        return redirect(route('chirps.index'));
    }
}
