<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'category_id' => rand(1, App\Category::count()),
        'enum' => Todo::getPossibleEnumValues('status')[array_rand(Todo::getPossibleEnumValues('status'))]
    ];
});
