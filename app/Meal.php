<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Translate;

class Meal extends Model
{
    protected $fillable = ['category_id','delete_at'];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    protected $table = 'meals';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('meals', function (Builder $builder) {
            $locale = \App::getLocale();

            $builder->select('meals.*', 'translations.title', 'translations.description')
                ->join('translations', 'meals.id', '=', 'translations.model_id')
                ->where('translations.model', 'meal')->where('translations.language_code', $locale);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'meal_tag');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredient');
    }
}
