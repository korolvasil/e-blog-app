<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'category_id' => rand(1, 20),
        'title' => $title = $faker->sentence(rand(3, 6), true),
        'slug' => Str::slug($title),
        'excerpt' => $faker->text(rand(50, 100)),
        'content' => $faker->realText(rand(1500, 5000)),
        'is_published' => $isPublished = rand(1, 5) > 1,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-5 days') : null,
        'created_at' => $createdAt = $faker->dateTimeBetween('-3 months', '-2 months'),
        'updated_at' => $createdAt
    ];
});
