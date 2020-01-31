<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserModel
 * @package App
 * @method static find(int $id)
 */
class UserModel extends Model
{
    public $table = 'users';
    public $connection = 'mysql';

}
