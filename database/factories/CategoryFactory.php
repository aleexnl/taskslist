<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'parent' => Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
