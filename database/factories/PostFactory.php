<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author' => function () {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->text($maxNbChars = 50),
        'content' => $faker->paragraph,
        'thumbnail_path' => json_encode([$faker->imageUrl($width = 640, $height = 480),$faker->imageUrl($width = 640, $height = 480)]),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
