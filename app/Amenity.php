<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable=['owner_id','wifi','pet','disabled','music','parking','airc','sauna','spa','gym','pool','smoke','no_smoke','credit','conference','child','steakhouse','vegan_food','vegan_wines','seafood'];
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}
