<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomPassword extends Model
{
    protected $table='room_password';
    protected $primaryKey='room_password_id';
    public $timestamps=false;
}
