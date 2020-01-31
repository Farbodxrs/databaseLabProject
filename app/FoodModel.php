<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FoodModel
 * @package App
 */
class FoodModel extends Model
{
    public $table = 'foods';
    public $connection = 'mysql';
    public $timestamps = false;
}
