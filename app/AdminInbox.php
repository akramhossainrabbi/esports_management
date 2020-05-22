<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInbox extends Model
{
    protected $table='admin_inbox';
    protected $primaryKey='admin_inbox_id';
    public $timestamps=false;
}
