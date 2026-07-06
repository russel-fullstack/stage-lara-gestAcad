<?php

namespace App\Models\Academic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
