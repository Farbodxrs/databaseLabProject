<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressModel
 * @package App
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class AddressModel extends Model
{
    public $table = 'addresses';
    public $connection = 'mysql';
    public $timestamps = false;
}
