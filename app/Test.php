<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Test extends Model
{
    protected $connection= 'mongodb';
    protected $collection = 'tests_collection';
}
