<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchasedModel
 * @package App
 */
class PurchasedModel extends Model
{
    public $table = 'purchased';
    public $connection = 'mysql';
}
