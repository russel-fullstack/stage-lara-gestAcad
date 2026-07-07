<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreSpecialtyRequest;
use App\Http\Requests\Academic\UpdateSpecialtyRequest;
use App\Models\Academic\Program;
use App\Models\Academic\Specialty;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::with('program')
            ->latest()
            ->paginate(5);
        $programs = Program::all();
        return view('academic.specialties.specialties-index', compact('specialties', 'programs'));
    }

    public function create()
    {
        $programs = Program::all();
        return view('academic.specialties.specialties-create', compact('programs'));
    }

    public function store(StoreSpecialtyRequest $request)
    {
        $validated = $request->validated();

        Specialty::create($validated);
        return to_route('academic.specialties.index')
            ->with('success', 'Specialité ajoutée avec success.');
    }

    public function edit(Specialty $specialty)
    {
        $programs = Program::all();
        return view('academic.specialties.specialties-edit', compact('specialty', 'programs'));
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $validated = $request->validated();
        $specialty->update($validated);
        return to_route('academic.specialties.index')->with('success', 'Spécialité modifiée avec success');
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return to_route('academic.specialties.index')->with('success', 'Spécialité supprimée avec success');
    }

}
