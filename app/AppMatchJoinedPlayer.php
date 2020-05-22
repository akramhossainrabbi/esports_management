<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppMatchJoinedPlayer extends Model
{
    protected $table='users_joined_in_match';
    protected $primaryKey='users_joined_in_match_id';
    public $timestamps=false;
}
