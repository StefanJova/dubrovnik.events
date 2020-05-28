<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostCategory extends Model
{
    public function hosts(){
        return $this->hasMany('App\Owner');
    }
}
