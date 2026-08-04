<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class InventorFactory extends Factory
{
    protected $model = Inventor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => Str::random(10),
            'name' => fake()->name(),
            'price' => fake()->randomNumber(4),
            'stock' => fake()->randomNumber(2),

            'nama' => fake()->name(), 'nik' => fake()->randomNumber(16), 'alamat' => fake()->address(),
            'foto_ktp' => Str::random(10), 'foto_diri' => Str::random(10), 'telepon' => fake()->randomNumber(12),
            'pekerjaan' => rand(1,89), 'pendidikan' => rand(1,10),
            'kategori' => fake()->randomElement([3,5]),
            'tipe' => fake()->randomElement([1,2]), 'id_kel' => '', 'id_kec' => '',
            'k_lembaga' => fake()->name(), 'k_nama' => fake()->name(), 'k_ketua' => fake()->name(),
            'k_anggota1' => fake()->name(), 'k_anggota2' => fake()->name(), 'k_anggota3' => fake()->name(), 'k_anggota4' => fake()->name()

        ];
    }
}
