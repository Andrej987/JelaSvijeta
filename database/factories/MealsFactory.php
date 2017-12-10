<?php


use Faker\Generator as Faker;


$factory->define(App\Meal::class, function (Faker $faker) use ($factory) {



    return [
        'category_id' => rand(0,10)
    ];

});




