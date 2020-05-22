<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table='subscribed';
    protected $primaryKey='subscribed_id';
    public $timestamps=false;
}
