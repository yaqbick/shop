<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Author::class, 20)->create()->each(function ($author) {
            $author->hasBook()->save(factory(App\Book::class)->make());
        });
    }
}
