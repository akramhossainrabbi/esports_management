<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInbox extends Model
{
    protected $table='user_info';
    protected $primaryKey='user_id';
    public $timestamps=false;
}
