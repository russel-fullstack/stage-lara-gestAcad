<?php

namespace App\Models\Academic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialty extends Model
{
    protected $fillable = [
        'program_id',
        'code',
        'libelle',
        'description'
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function levels(): HasMany
    {
        return $this->hasMany(Level::class);
    }
}
