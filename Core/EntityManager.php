<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 07/11/18
 * Time: 00:03
 */

namespace Core;


class EntityManager
{


    /**
     * @var string $repositoryName
     * @return BaseRepository|| null
     */
    public  static function getRepository($repositoryName)
    {
        $repositoryClass="Chat\Models\Repositories\\".ucfirst($repositoryName.'Repository');

        if(class_exists($repositoryClass)){
            return new $repositoryClass($repositoryName);
        }else{
            echo 'Error class repository not found';
            die;
        }
    }

}