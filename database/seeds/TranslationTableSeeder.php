<?php

use App\Ingredient;
use App\Meal;
use App\Tag;
use App\Translate;
use Illuminate\Database\Seeder;

class TranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $tags = Tag::all();
//        foreach ($tags as $tag) {
//            Translate::create(['model_id' => $tag->id, 'model' => 'tag', 'title' => 'The_Pizza', 'language_code' => 'en']);
//            Translate::create(['model_id' => $tag->id, 'model' => 'tag', 'title' => 'Pizza', 'language_code' => 'hr']);
//            Translate::create(['model_id' => $tag->id, 'model' => 'tag', 'title' => 'Das Pizza', 'language_code' => 'de']);
//        }
//
//        $ingredients = Ingredient::all();
//        foreach ($ingredients as $ingredient){
//            Translate::create(['model_id'=> $ingredient->id, 'model'=> 'ingredient', 'title'=> 'salt', 'language_code'=>'en']);
//            Translate::create(['model_id'=> $ingredient->id, 'model'=> 'ingredient', 'title'=> 'sol', 'language_code'=>'hr']);
//            Translate::create(['model_id'=> $ingredient->id, 'model'=> 'ingredient', 'title'=> 'das salt', 'language_code'=>'de']);
//        }
//
//        $meals = Meal::all();
//        foreach ($meals as $meal){
//            Translate::create(['model_id'=> $meal->id, 'model'=> 'meal', 'title'=> 'the sarma', 'language_code'=>'en', 'description'=>'A perfect mix of cabbage and flash']);
//            Translate::create(['model_id'=> $meal->id, 'model'=> 'meal', 'title'=> 'sarma', 'language_code'=>'hr','description'=>'Savršen mix kupusa i mesa']);
//            Translate::create(['model_id'=> $meal->id, 'model'=> 'meal', 'title'=> 'das sarma', 'language_code'=>'de','description'=>'Das perfect mix aus kohl and fleisch']);
//        }

        $meals = Meal::all();
        foreach ($meals as $meal){
            Translate::create(['model_id'=> $meal->id, 'model'=> 'category', 'title'=> 'english meals', 'language_code'=>'en']);
            Translate::create(['model_id'=> $meal->id, 'model'=> 'category', 'title'=> 'hrvatska jela', 'language_code'=>'hr']);
            Translate::create(['model_id'=> $meal->id, 'model'=> 'category', 'title'=> 'deutsche mahlzeiten', 'language_code'=>'de']);
        }

    }
}
