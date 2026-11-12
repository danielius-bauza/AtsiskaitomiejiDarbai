<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(50)->get();

        return view('home', ['chirps' => $chirps]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp = new Chirp($validated);
        $chirp->user_id = auth()->id();
        $chirp->save();

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }

    public function edit(Chirp $chirp)
    {
        abort_unless($chirp->user_id === auth()->id(), 403);

        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        abort_unless($chirp->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated!');
    }

    public function destroy(Chirp $chirp)
    {
        abort_unless($chirp->user_id === auth()->id(), 403);

        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }
}
