<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable=['owner_id','event_id','instagram','facebook','twitter','tadvisor','website'];
}
