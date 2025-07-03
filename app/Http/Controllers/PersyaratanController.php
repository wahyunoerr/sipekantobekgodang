<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Requests\PersyaratanRequest;

class PersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Persyaratan::query();

        if ($request->has('q') && $request->q !== null) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $persyaratans = $query->latest()->paginate(10);
        return inertia('Persyaratan/Index', compact('persyaratans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Persyaratan/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersyaratanRequest $request)
    {
        Persyaratan::create($request->validated());
        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persyaratan $persyaratan)
    {
        return inertia('Persyaratan/Show', compact('persyaratan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persyaratan $persyaratan)
    {
        return inertia('Persyaratan/Edit', compact('persyaratan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersyaratanRequest $request, Persyaratan $persyaratan)
    {
        $persyaratan->update($request->validated());
        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persyaratan $persyaratan)
    {
        $persyaratan->delete();
        return redirect()->route('persyaratan.index')->with('success', 'Persyaratan berhasil dihapus.');
    }
}
