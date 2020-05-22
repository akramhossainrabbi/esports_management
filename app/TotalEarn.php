<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalEarn extends Model
{
    protected $table='total_earn';
    protected $primaryKey='earn_id';
    public $timestamps=false;
}
