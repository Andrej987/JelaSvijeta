<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['slug'];

    protected $table = 'ingredients';

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tags', function (Builder $builder) {
            $locale = \App::getLocale();

            $builder->select('ingredients.id', 'translations.title', 'ingredients.slug')
                ->join('translations', 'ingredients.id', '=', 'translations.model_id')
                ->where('translations.model', 'ingredient')->where('translations.language_code', $locale);
        });
    }

    public function meals() {

        return $this->belongsToMany(Meal::class,'meal_ingredient');

    }
}
