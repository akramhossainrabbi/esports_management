<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUserBalance extends Model
{
    protected $table='balance';
    protected $primaryKey='balance_id';
    public $timestamps=false;
}
