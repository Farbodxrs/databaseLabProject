<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserModel
 * @package App
 */
class UserModel extends Model
{
    public $table = 'users';
    public $connection = 'mysql';

}
