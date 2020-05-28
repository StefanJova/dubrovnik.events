<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PlacesToSee extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable=['name','lng','lat','location','desc_en','desc_hr','slug'];


    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
