<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BikeModel
 * @package App
 * @method static find(Http\Controllers\B $id)
 */
class BikeModel extends Model
{
    public $table = 'bikes';
    public $connection = 'mysql';
    public $timestamps = false;
}
