<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPassReset extends Model
{
    protected $table='password_reset';
    protected $primaryKey='userId';
    public $timestamps=false;
}
