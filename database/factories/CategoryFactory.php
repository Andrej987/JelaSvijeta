<?php

use Faker\Generator as Faker;


$factory->define(App\Category::class, function (Faker $faker) {

    return [
        'title' => $faker->title,
        'slug' => $faker->slug,

    ];
});