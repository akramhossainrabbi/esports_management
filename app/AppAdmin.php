<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppAdmin extends Model
{
    protected $table='admin_info';
    protected $primaryKey='admin_id';
    public $timestamps=false;
}
