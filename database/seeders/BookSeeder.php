<?php

namespace Database\Seeders;

use App\Models\Library\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(100)->create();
    }
}
