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
     * @var BaseRepository $entityRepository .
     */
    protected $entityRepository;
    /**
     * @var array $errors .
     */
    protected $errors = [];


    /**
     * UserHandler constructor.
     */
    public function __construct()
    {
        $this->entityRepository = self::getRepository('message');
        $this->errors = ['add_message' => []];
    }

    /**
     * @var string $repositoryName
     * @return BaseRepository|| null
     */
    public static function getRepository($repositoryName)
    {
        $repositoryClass="Chat\Repositories\\".ucfirst($repositoryName.'Repository');

        if(class_exists($repositoryClass)){
            return new $repositoryClass($repositoryName);
        }else{
            echo 'Error class repository not found';
            die;
        }
    }

}