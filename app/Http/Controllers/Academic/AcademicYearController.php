<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Academic\AcademicYear;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Academic\StoreAcademicYearRequest;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYears = AcademicYear::orderByDesc('date_debut')->paginate(10);

        return view('academic.academic-years.academic-years-index', compact('academicYears'));
    }

    public function toggle(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->update(['est_active' => ! $academicYear->est_active], []);

        $status = $academicYear->est_active ? 'activée' : 'désactivée';

        return back()->with('success', "L'année académique {$academicYear->libelle} a été {$status}.");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academic.academic-years.academic-years-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAcademicYearRequest $request)
    {
        AcademicYear::create($request->validated());
        return redirect()->route('academic.academic-years.index')->with('success', "L'année académique {$request->libelle} a été créée avec succès.");

    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();
        return redirect()->route('academic.academic-years.index')->with('success', 'année supprimée avec success');
    }
}
