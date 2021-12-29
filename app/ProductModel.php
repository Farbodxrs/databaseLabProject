<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductModel
 * @package App
 * @method static whereIn()
 * @method static find($id)
 */
class ProductModel extends Model
{
    public $table = 'shop_products';
    public $connection = 'mysql';
    public $timestamps = false;
}
