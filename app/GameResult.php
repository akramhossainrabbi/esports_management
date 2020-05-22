<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    protected $table='result';
    protected $primaryKey='result_id';
    public $timestamps=false;
}
