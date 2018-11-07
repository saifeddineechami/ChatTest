<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 07/11/18
 * Time: 10:58
 */

namespace Chat\Models\Repositories;

use Core\BaseRepository;
class UserRepository extends BaseRepository
{
    public $table = "user";
    public $entity = "User";
}