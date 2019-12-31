<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->colorName,
        'slug' => Str::slug($name),

        'is_published' => $isPublished = rand(1, 4) > 1,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-5 days') : null,
        'created_at' => $createdAt = $faker->dateTimeBetween('-3 months', '-2 months'),
        'updated_at' => $createdAt
    ];
});
