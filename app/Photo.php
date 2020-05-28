<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads='/images/uploads/';
    protected $fillable = ['file', 'owner_id','event_id','places_to_see_id'];
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
    public function event(){
        return $this->belongsTo('App\Event');
    }
}
