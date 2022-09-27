<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailBantuan>
 */
class DetailBantuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'keluarga_id' => $this->faker->numberBetween(1, 2),
            'bantuan_id' => $this->faker->numberBetween(1, 2),
            'tahap_1' => $this->faker->date(),
            'tahap_2' => $this->faker->date(),
        ];
    }
}
