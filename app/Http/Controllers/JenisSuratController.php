<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Persyaratan;
use App\Models\JenisForm;
use App\Http\Requests\JenisSuratRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JenisSurat::with(['form', 'persyaratans']);

        if ($request->has('q') && $request->q !== null) {
            $query->where('name', 'like', '%' . $request->q . '%')
                ->orWhereHas('form', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->q . '%');
                })
                ->orWhereHas('persyaratans', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->q . '%');
                });
        }

        $jenisSurats = $query->latest()->paginate(10);
        return Inertia::render('JenisSurat/Index', ['jenisSurats' => $jenisSurats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $forms = JenisForm::all();
        $persyaratans = Persyaratan::all();
        return Inertia::render('JenisSurat/Create', [
            'forms' => $forms,
            'persyaratans' => $persyaratans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JenisSuratRequest $request)
    {
        $jenisSurat = JenisSurat::create($request->validated());
        $jenisSurat->persyaratans()->sync($request->input('persyaratan_ids', []));
        return redirect()->route('jenis-surats.index')->with('success', 'Jenis Surat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSurat $jenisSurat)
    {
        return Inertia::render('JenisSurat/Show', ['jenisSurat' => $jenisSurat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSurat $jenisSurat)
    {
        $forms = JenisForm::all();
        $persyaratans = Persyaratan::all()->map(function ($persyaratan) use ($jenisSurat) {
            $persyaratan->checked = $jenisSurat->persyaratans->contains($persyaratan->id);
            return $persyaratan;
        });
        return Inertia::render('JenisSurat/Edit', [
            'jenisSurat' => $jenisSurat,
            'forms' => $forms,
            'persyaratans' => $persyaratans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisSuratRequest $request, JenisSurat $jenisSurat)
    {
        $jenisSurat->update($request->validated());
        $jenisSurat->persyaratans()->sync($request->input('persyaratan_ids', []));
        return redirect()->route('jenis-surats.index')->with('success', 'Jenis Surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSurat $jenisSurat)
    {
        $jenisSurat->delete();
        return redirect()->route('jenis-surats.index')->with('success', 'Jenis Surat berhasil dihapus.');
    }
}
