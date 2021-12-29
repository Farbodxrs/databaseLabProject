<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class log1Model
 * @package App
 */
class log1Model extends Model
{
    public $table = 'addresses_log';
    public $connection = 'mysql';
    public $timestamps = false;
}
