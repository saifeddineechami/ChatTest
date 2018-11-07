<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 06/11/18
 * Time: 17:47
 */

namespace Core;


abstract class BaseEntity
{
    protected $id;

    /**
     * Entity constructor.
     * @var array $data
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return  $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {

                $this->$method($value);
            }
        }
    }

    /**
     * @var string $repositoryName
     * @return BaseRepository|| null
     */
    public static function getRepository()
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