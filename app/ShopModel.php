<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopModel
 * @package App
 * @method static find($id)
 */
class ShopModel extends Model
{
    public $table = 'shops';
    public $connection = 'mysql';
    public $timestamps = false;
}
