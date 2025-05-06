<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    protected $model = Noticia::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->sentence(10),
            'conteudo' => $this->faker->paragraphs(5, true),
            'imagem' => 'noticias/' . $this->faker->image('public/storage/noticias', 640, 480, null, false),
            'destaque' => $this->faker->boolean(20), // 20% de chance de ser destaque
        ];
    }
}
