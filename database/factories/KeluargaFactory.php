<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_kk' => $this->faker->ean13(),
            'kepala_keluarga' => $this->faker->name(),
            'nik_kepala_keluarga' => $this->faker->nik(),
            'dusun' => $this->faker->streetAddress(),
            'rt' => $this->faker->buildingNumber(),
            'rw' => $this->faker->buildingNumber(),
            'desa' => $this->faker->streetName(),
            'kode_pos' => $this->faker->postcode(),
            'kecamatan' => $this->faker->stateAbbr(),
            'kabupaten_kota' => $this->faker->city(),
            'provinsi' => $this->faker->state(),
            // 'penduduk_id' => $this->faker->numberBetween(0, 40),
        ];
    }
}
