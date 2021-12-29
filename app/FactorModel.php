<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FactorModel
 * @package App
 */
class FactorModel extends Model
{
    public $table = 'factors';
    public $connection = 'mysql';
}
