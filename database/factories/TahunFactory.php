<?php

namespace Database\Factories;

use App\Tahun;
use Illuminate\Database\Eloquent\Factories\Factory;

class TahunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tahun::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun' => fake()->randomNumber(4),
        ];
    }
}
