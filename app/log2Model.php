<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class log2Model
 * @package App
 */
class log2Model extends Model
{
    public $table = 'customers_log';
    public $connection = 'mysql';
    public $timestamps = false;
}
