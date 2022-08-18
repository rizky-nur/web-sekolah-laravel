<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siswa>
 */
class siswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'jurusan_id' => fake()->randomElement([1,2,3,4,5,6,7]),
            'image' => 'siswa/anonime.jpeg',
            'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
        ];
    }
}