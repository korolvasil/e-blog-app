<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {

    $name = $faker->sentence(rand(1, 2), true);
    $description = $faker->realText(rand(10, 35));
    $isPublished = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'user_id' => 1,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-5 days') : null,
        'description' => $description,
        'created_at' => $createdAt,
        'updated_at' => $createdAt
    ];
});
