<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddMatch extends Model
{
    protected $table='match';
    protected $primaryKey='match_id';
    public $timestamps=false;
}
