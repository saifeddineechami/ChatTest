<?php

namespace Chat\Models\Repositories;

use Core\BaseRepository;

class UserRepository extends BaseRepository
{
    public $table = "user";
    public $entity = "User";
}
