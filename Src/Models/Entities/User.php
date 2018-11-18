<?php

namespace Chat\Models\Entities;

use Core\BaseEntity;

class User extends BaseEntity
{
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $email;
    protected $password;
    protected $confirmPassword;
    protected $isLogged;
    protected $createdAt;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param  $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstname = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param  $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param  mixed $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param  $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param  string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }



    /**
     * @return string
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * @param  string $confirmPassword
     * @return $this
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsLogged()
    {
        return $this->isLogged;
    }

    /**
     * @param  boolean $isLogged
     * @return $this
     */
    public function setIsLogged($isLogged)
    {
        $this->isLogged = $isLogged;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param  \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return $this
     */
    public function cryptPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        return $this;
    }

    public function toArray()
    {
        $attributes = get_object_vars($this);
        unset($attributes['confirmPassword']);

        return $attributes;
    }
}
