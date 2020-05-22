<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    protected $table='news_feed';
    protected $primaryKey='news_feed_id';
    public $timestamps=false;
}
