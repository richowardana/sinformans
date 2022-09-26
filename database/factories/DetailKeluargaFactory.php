<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailKeluarga>
 */
class DetailKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'keluarga_id' => $this->faker->numberBetween(1, 10),
            'penduduk_id' => $this->faker->numberBetween(1, 40),
            'jabatan' => $this->faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak Kandung', 'Anak Angkat', 'Nenek', 'Kakek', 'Keponakan']),
        ];
    }
}
