<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $fillable = ['model_id','model','language_code','title','description'];

    protected $table = 'translations';

    public function language(){

        return $this->hasMany(Langauge::class);

    }

}
