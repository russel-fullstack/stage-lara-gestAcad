<?php

use App\Http\Controllers\Academic\AcademicYearController;
use App\Http\Controllers\Academic\LevelController;
use App\Http\Controllers\Academic\ProgramController;
use App\Http\Controllers\Academic\SpecialtyController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'));
Route::get('/dashboard', fn () => view('dashboard'));

Route::prefix('academic')->name('academic.')->group(function () {

    //années académiques
    Route::resource('academic-years', AcademicYearController::class)->except(['show']);

    Route::patch('academic-years/{academicYear}/toggle', [AcademicYearController::class, 'toggle'])->name('academic-years.toggle');

    //filières
    Route::resource('programs', ProgramController::class)->except(['show']);

    //spécialités
    Route::resource('specialties', SpecialtyController::class)->except(['show']);

    //niveaux d'études
    Route::resource('levels', LevelController::class)->except(['show']);

    //semestres
    Route::get('semesters', fn () => view('academic.semesters.semesters-index'))->name('semesters.index');
    Route::get('semesters/create', fn () => view('academic.semesters.semesters-create'))->name('semesters.create');
    Route::get('semesters/{id}/edit', fn ($id) => view('academic.semesters.semesters-edit', compact('id')))->name('semesters.edit');

    //unités d'enseignement
    Route::get('course-units', fn () => view('academic.course-units.course-units-index'))->name('course-units.index');
    Route::get('course-units/create', fn () => view('academic.course-units.course-units-create'))->name('course-units.create');
    Route::get('course-units/{id}/edit', fn ($id) => view('academic.course-units.course-units-edit', compact('id')))->name('course-units.edit');

});
