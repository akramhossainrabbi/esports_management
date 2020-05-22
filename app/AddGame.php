<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddGame extends Model
{
    protected $table='all_games';
    protected $primaryKey='game_id';
    public $timestamps=false;
}
