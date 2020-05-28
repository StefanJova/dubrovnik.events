<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['name','email','phone','date','desc','time','owner_id','event_id','num_people','done'];
    protected $dates=['date'];

    public function owner(){
        return $this->belongsTo('App\Owner');
    }
    public function event(){
        return $this->belongsTo('App\Event','event_id','id');
    }
}
