<?php

namespace Database\Seeders;

use App\Models\Library\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fantastyka',
            'Kryminał',
            'Dramat',
            'Komedia',
            'Science Fiction',
            'Romans',
            'Horror',
            'Thriller',
            'Biografia',
            'Historia',
            'Sztuka',
            'Poezja',
            'Filozofia',
            'Nauka',
            'Przyroda',
            'Podróże',
            'Technologia',
            'Fantasy',
            'Biznes',
            'Sensacja'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
