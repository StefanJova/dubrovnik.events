<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerInfo extends Model
{
    protected $fillable=['owner_id','opening','closing','capacity','lng','lat'];
}
