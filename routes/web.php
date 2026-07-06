<?php

use App\Http\Controllers\Academic\ProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Academic\AcademicYearController;

Route::get('/', fn () => view('home'));
Route::get('/dashboard', fn () => view('dashboard'));

Route::prefix('academic')->name('academic.')->group(function () {

    //années académiques
    Route::resource('academic-years', AcademicYearController::class)->except(['show']);

    Route::patch('academic-years/{academicYear}/toggle', [AcademicYearController::class, 'toggle'])->name('academic-years.toggle');

    //filières
    Route::resource('programs', ProgramController::class)->except(['show']);

    //spécialités
    Route::get('specialities', fn () => view('academic.specialities.specialities-index'))->name('specialities.index');
    Route::get('specialities/create', fn () => view('academic.specialities.specialities-create'))->name('specialities.create');
    Route::get('specialities/{id}/edit', fn ($id) => view('academic.specialities.specialities-edit', compact('id')))->name('specialities.edit');

    //niveaux d'études
    Route::get('levels', fn () => view('academic.levels.levels-index'))->name('levels.index');
    Route::get('levels/create', fn () => view('academic.levels.levels-create'))->name('levels.create');
    Route::get('levels/{id}/edit', fn ($id) => view('academic.levels.levels-edit', compact('id')))->name('levels.edit');

    //semestres
    Route::get('semesters', fn () => view('academic.semesters.semesters-index'))->name('semesters.index');
    Route::get('semesters/create', fn () => view('academic.semesters.semesters-create'))->name('semesters.create');
    Route::get('semesters/{id}/edit', fn ($id) => view('academic.semesters.semesters-edit', compact('id')))->name('semesters.edit');

    //unités d'enseignement
    Route::get('course-units', fn () => view('academic.course-units.course-units-index'))->name('course-units.index');
    Route::get('course-units/create', fn () => view('academic.course-units.course-units-create'))->name('course-units.create');
    Route::get('course-units/{id}/edit', fn ($id) => view('academic.course-units.course-units-edit', compact('id')))->name('course-units.edit');

});
