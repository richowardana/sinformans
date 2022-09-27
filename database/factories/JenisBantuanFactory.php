<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisBantuan>
 */
class JenisBantuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bantuan' => $this->faker->shuffle('BLTPKH'),
            'penerima' => $this->faker->randomElement(['Individu', 'Keluarga']),
            'tahapan' => mt_rand(1, 2),
            'tgl_mulai' => $this->faker->date(),
            'tgl_selesai' => $this->faker->date(),
        ];
    }
}
