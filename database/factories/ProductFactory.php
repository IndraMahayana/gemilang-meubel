<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $names = [
            'Kasur Spring Bed',
            'Lemari Pakaian',
            'Meja Makan Minimalis',
            'Sofa Ruang Tamu',
            'Rak Buku Kayu',
            'Kursi Santai',
            'Meja Belajar',
            'Buffet TV',
            'Lemari Dapur',
            'Kasur Lipat'
        ];

        $name = $this->faker->randomElement($names);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(500000, 5000000),
            'image' => 'products/' . $this->faker->image('public/images/products', 400, 300, null, false),
            'stock' => $this->faker->numberBetween(1, 50),
            'rating' => $this->faker->randomFloat(1, 3, 5),
        ];
    }
}
