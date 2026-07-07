<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\Program\StoreProgramRequest;
use App\Http\Requests\Academic\Program\UpdateProgramRequest;
use App\Models\Academic\Program;
use App\Models\Academic\Specialty;

class ProgramController extends Controller
{
    public function index() {
        $programs = Program::with('Specialties')
            ->latest()
            ->paginate(5);
        $specialties = Specialty::all();
        return view('academic.programs.programs-index', compact('programs', 'specialties'));
    }

    public function create() {

        return view('academic.programs.programs-create');
    }

    public function store(StoreProgramRequest $request) {
        Program::create($request->validated());
        return to_route('academic.programs.index')->with('success', 'Programme créé avec success.');
    }

    public function edit(Program $program) {
        return view('academic.programs.programs-edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program) {
        $program->update($request->validated());
        return to_route('academic.programs.index')->with('success', 'Programm€ modifié avec success.');
    }

    public function destroy(Program $program) {
        $program->delete();
        return to_route('academic.programs.index')->with('success', 'Programme supprimé avec Success.');
    }
}
