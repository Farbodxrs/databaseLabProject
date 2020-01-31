<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressModel
 * @package App
 */
class AddressModel extends Model
{
    public $table = 'addresses';
    public $connection = 'mysql';
}
