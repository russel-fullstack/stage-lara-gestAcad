<?php

namespace Database\Factories\Academic;

use App\Enums\DiplomaType;
use App\Models\Academic\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $diplomes = DiplomaType::values();
        return [
            'code' => strtoupper($this->faker->unique()->bothify('??###')),
            'libelle' => fake()->sentence(3),
            'description' => fake()->optional()->paragraph(),
            'type_diplome'=> fake()->randomElement($diplomes),
            'nombre_semestres' => fake()->randomElement([4, 6, 10]),
        ];
    }
}
