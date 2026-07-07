<?php

namespace App\Models\Academic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'description',
        'libelle',
        'nombre_semestres',
        'type_diplome',
    ];

    public function specialties(): HasMany
    {
        return $this->hasMany(Specialty::class);
    }

    public function levels(): HasMany
    {
        return $this->hasMany(Level::class);
    }
}
