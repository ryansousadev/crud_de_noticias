<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text(300),
            'image' => 'images/news/' . $this->faker->word . '.jpg',
        ];
    }
}