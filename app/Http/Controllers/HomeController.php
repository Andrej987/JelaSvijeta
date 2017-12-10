<?php

namespace App\Http\Controllers;


use App\Http\Responses\API\MealCollection;
use Illuminate\Http\Request;
use App\Meal;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $params = $request->all();

        if (isset($params['lang'])) {
            \App::setLocale($params['lang']);
        }

        $query = Meal::select();

            if (isset($params['with'])) {
                $withParams = explode(',', $params['with']);
                $filter = array('tags', 'ingredients', 'category');

                foreach ($withParams as $param) {

                    if (in_array($param, $filter, true)) {
                        $query->with($param);
                    }
                }
            }

            if (isset($params['category'])) {
                if (is_numeric($params['category'])) {
                    $query->where('category_id', $params['category']);
                } elseif ($params['category'] == 'NULL') {
                    $query->whereNull('category_id');
                } elseif ($params['category'] == '!NULL') {
                    $query->whereNotNull('category_id');
                }
            }

            if (isset($params['tags'])) {
                $tags = explode(',', $params['tags']);

                $query->join('meal_tag', 'meals.id', '=', 'meal_tag.meal_id');
                $query->whereIn('meal_tag.tag_id', $tags);

            }

            $per_page = isset($params['per_page']) ? $params['per_page'] : 5;

            $meals = $query->paginate($per_page);

            return MealCollection::collection($meals);

            // return response()->json($meals);
    }
}
