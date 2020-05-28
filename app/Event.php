<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['owner_id','name','desc','time_from','time_to','date_from','date_to','lng','lat','featured','location','event_category_id','accept_reservations'];
    protected $dates=['date_from','date_to'];

    public function owner(){
        return $this->belongsTo('App\Owner');
    }
    public function photos(){
        return $this->hasMany('App\Photo');
    }
    public function category(){
        return $this->belongsTo('App\EventCategory','event_category_id');
    }
}
