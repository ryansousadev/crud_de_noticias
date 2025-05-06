<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    public function run()
    {
        // Criar 20 notícias usando a factory
        Noticia::factory()->count(20)->create();
    }
}
