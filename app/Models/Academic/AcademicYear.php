<?php

namespace App\Models\Academic;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{

    protected $fillable = [
        'est_active',
        'libelle',
        'date_debut',
        'date_fin',
    ];
   protected  function casts () {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
            'est_active' => 'boolean',
        ];
   }

   protected static function booted() : void {
        static::creating(function ($academicYear) {
            if ($academicYear->est_active) {
                // Désactiver toutes les autres années académiques
                static::where('est_active', true)
                ->update(['est_active' => false]);
            }
        });

        static::updating(function ($academicYear) {
            if ($academicYear->est_active && $academicYear->isDirty('est_active')) {
                // Désactiver toutes les autres années académiques
                static::where('est_active', true)
                    ->where('id', '!=', $academicYear->id)
                    ->update(['est_active' => false]);
            }
        });
   }
}
