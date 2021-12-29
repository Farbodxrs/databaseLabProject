<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FactorReceiptModel
 * @package App
 */
class FactorReceiptModel extends Model
{
    public $table = 'factor_receipt';
    public $connection = 'mysql';
    public $timestamps = false;
}
