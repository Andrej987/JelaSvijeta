<?php

use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Meal::class)->create()->each(function ($meal) {
            $meal->ingredients()->attach(factory(App\Ingredient::class)->create());
        });

        factory(App\Meal::class)->create()->each(function ($meal) {
            $meal->tags()->attach(factory(App\Tag::class)->create());
        });
    }
}
