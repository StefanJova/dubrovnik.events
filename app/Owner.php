<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Owner extends Model
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
    protected $fillable=['name','email','phone','location','desc','coord_id','social_id','accept_reservations','slug','host_category_id','featured'];

    public function info(){
        return $this->hasOne('App\OwnerInfo');
    }
    public function photos(){
        return $this->hasMany('App\Photo');
    }
    public function category(){
        return $this->belongsTo('App\HostCategory','host_category_id','id');
    }
}
