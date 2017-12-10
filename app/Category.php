<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['slug'];

    protected $table = 'category';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('category', function (Builder $builder) {
            $locale = \App::getLocale();

            $builder->select('category.id', 'translations.title', 'category.slug')
                ->join('translations', 'category.id', '=', 'translations.model_id')
                ->where('translations.model', '=', 'category')->where('translations.language_code', $locale);
        });
    }

    public function meals(){

        return $this->hasMany(Meal::class);

    }
}
