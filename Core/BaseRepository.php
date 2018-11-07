<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 07/11/18
 * Time: 00:10
 */

namespace Core;

use Core\BaseEntity as Entity;
use \PDO;
use \PDOException;
use \DateTime;
abstract class BaseRepository
{
    /** @var null PDO $connection */
    protected static $connection = null;


    /**
     * @return PDO
     */
    public static function getDBInstance()
    {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new PDO("mysql:dbname=".__dbname__.";host=".__host__, __dbuser__, __dbpassword__);

            } catch (PDOException $e) {

                echo 'Connection failed: '.$e->getMessage();
                exit();
            }
        }

        return self::$connection;
    }

    /**
     * @param Entity $entity
     * @return string
     */
    public function add(Entity $entity)
    {
        $entity->setCreatedAt((new DateTime())->format('Y-m-d H:i'));
        $statement = "INSERT INTO {$this->table}(";
        $statementValues = [];
        $statementNames = [];
        $values = [];

        foreach ($entity->toArray() as $fieldName => $fieldValue) {
            $statementNames[] = $fieldName;
            $statementValues[] = "?";
            $values[] = $fieldValue;
        }

        $statement .= implode(',', $statementNames).') VALUES('.implode(',', $statementValues).')';
        $query = self::getDBInstance()->prepare($statement);
        $result = $query->execute($values);

        if ($result) {
            $id = self::getDBInstance()->lastInsertId();
            $entity->setId($id);

            return $id;
        } else {
            var_dump( $query->errorInfo());
            die;
        }

    }

    /**
     * @param Entity $entity
     */
    public function delete(Entity $entity)
    {
        $statement = "DELETE FROM {$this->table} WHERE id = ?";
        $query = self::getDBInstance()->prepare($statement);
        $query->execute($entity->getId());
    }


    /**
     * @param Entity $entity
     */
    public function update(Entity $entity)
    {
        $statement = "UPDATE {$this->table} SET (";
        $statementValues = [];
        $statementNames = [];
        $values = [];

        foreach ($entity->toArray() as $fieldName => $fieldValue) {
            $statementNames[] = $fieldName;
            $statementValues[] = "?";
            $values[] = $fieldValue;
        }

        $statement .= implode(',', $statementNames).') VALUES('.implode(',', $statementValues).')';

        $statement .= " where id = ?";
        $values[] = $entity->getId();
        $query = self::getDBInstance()->prepare($statement);
        $query->execute($values);
    }

    /**
     * @param array $fields
     * @param array $sort
     * @return Entity|null|string
     */
    public function findOne(array $fields = [],$sort=['id'=>'desc'])
    {
        $query = $this->findBy($fields,$sort);
        $result = $query->fetch();
        if($result){
            $entity="Chat\Models\Entities\\".ucfirst($this->entity);
            /**@var Entity $entity */
            $entity = new $entity($result);

            return $entity;
        }
        return null;

    }

    /**
     * @param array $fields
     * @param array $sort
     * @param string $type
     * @return array
     */
    public function findAll(array $fields = [],$sort=['id'=>'desc'],$type='object')
    {
        $arrayResult = [];

        $query = $this->findBy($fields,$sort);
        $result = $query->fetchAll();

        if('object'===$type){
            // hydrate the result to an array //
            foreach ($result as $element) {
                $entity="Chat\Models\Entities\\".ucfirst($this->entity);
                $arrayResult[] = new $entity($element);
            }
            $result=$arrayResult;
        }

        return $result;
    }

    /**
     * @param array $fields
     * @param array $sort
     * @return bool|PDOStatement
     */
    protected function findBy(array $fields = [],$sort=['id'=>'desc'])
    {
        $searchValues = [];

        $statement = "SELECT * FROM {$this->table}";

        if (!empty($fields)) {
            $statement .= ' where 1=1 ';
            foreach ($fields as $fieldName => $fieldValue) {
                $statement .= "AND $fieldName = ? ";
                $searchValues[] = $fieldValue;
            }
        }
        if(!empty($sort)){
            $statement .= ' order by  ';
            foreach ($sort as $key=>$value){

                $statement.="$key $value";
            }
        }

        $query = self::getDBInstance()->prepare($statement);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result=$query->execute($searchValues);

        if ($result) {
            return $query;
        } else {
            var_dump( $query->errorInfo());
            die;
        }

    }


}