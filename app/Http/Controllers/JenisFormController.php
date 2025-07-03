<?php

namespace App\Http\Controllers;

use App\Models\JenisForm;
use App\Http\Requests\JenisFormRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JenisFormController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisForm::query();

        if ($request->has('q') && $request->q !== null) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }
        $jenisForms = $query->latest()->paginate(10);
        return Inertia::render('JenisForms/Index', ['jenisForms' => $jenisForms]);
    }

    public function create()
    {
        return Inertia::render('JenisForms/Create');
    }

    public function store(JenisFormRequest $request)
    {
        JenisForm::create($request->validated());
        return redirect()->route('jenis-forms.index');
    }

    public function show(JenisForm $jenisForm)
    {
        return Inertia::render('JenisForms/Show', ['jenisForm' => $jenisForm]);
    }

    public function edit(JenisForm $jenisForm)
    {
        return Inertia::render('JenisForms/Edit', ['jenisForm' => $jenisForm]);
    }

    public function update(JenisFormRequest $request, JenisForm $jenisForm)
    {
        $jenisForm->update($request->validated());
        return redirect()->route('jenis-forms.index');
    }

    public function destroy(JenisForm $jenisForm)
    {
        $jenisForm->delete();
        return redirect()->route('jenis-forms.index');
    }
}
