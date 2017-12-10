<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Tag extends Model
{
    protected $fillable=['slug'];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    protected $table = 'tags';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tags', function (Builder $builder) {
            $locale = \App::getLocale();

            $builder->select('tags.id', 'translations.title', 'tags.slug')
                ->join('translations', 'tags.id', '=', 'translations.model_id')
                ->where('translations.model', 'tag')->where('translations.language_code', $locale);
        });
    }

    public function meals() {

        return $this->belongsToMany(Meal::class, 'meal_tag');

    }
}
