<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Sport',
        'Ruby',
        'Libri e Riviste',
        'Musica',
        'Giochi',
        'Giardinaggio',
        'Cucina',
        'Motori',
    ];

    public function run(): void {
        // User::factory( 10 )->create();

        foreach ( $this->categories as $category ) {
            Category::create( [
                'name' => $category,
            ] );
        }
    }
}
