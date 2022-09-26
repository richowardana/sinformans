<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->nik(),
            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Khatolik', 'Hindu', 'Budha', 'Konghucu', 'Lainnya']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP/Sederajat', 'SMA/Sederajat', 'D1/D2', 'D3', 'D4/S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->jobTitle(),
            'status' => $this->faker->randomElement(['Belum Menikah', 'Menikah', 'Cerai']),
        ];
    }
}
