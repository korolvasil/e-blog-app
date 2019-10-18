<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $name = $faker->sentence(rand(1, 2), true),
        'slug' => Str::slug($name),
        'is_published' => $isPublished = rand(1, 5) > 1,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-5 days') : null,
        'description' => $faker->realText(rand(15, 35)),
        'created_at' => $createdAt = $faker->dateTimeBetween('-3 months', '-2 months'),
        'updated_at' => $createdAt
    ];
});
