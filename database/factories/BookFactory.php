<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'publisher_id' => function () {
            return factory(App\Publisher::class)->create()->id;
        },
        'publication_year' => $faker->year,
        'cover' => $faker->imageUrl,
        'price' => $faker->randomFloat(2, 15, 40),
        'description' => $faker->text,
        'translation' => $faker->name,
        'pages_number' => $faker->numberBetween(100, 300),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'comment_id' => function () {
            return factory(App\Comment::class)->create()->id;
        },
    ];
});
