<?php

namespace App\Http\Requests\Academic\Program;

use App\Enums\DiplomaType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:20', Rule::unique('programs', 'code')->ignore($this->program)],
            'libelle' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type_diplome' => ['required', Rule::enum(DiplomaType::class)],
            'nombre_semestres' => ['required', 'integer', 'min:4', 'max:12'],
        ];
    }
}
