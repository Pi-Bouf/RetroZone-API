<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Event\LifecycleEventArgs;

class Users
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;
    private $hotels;

    public function __construct()
    {
        $this->hotels = new ArrayCollection();
    }

    public function setCreatedAtValue(LifecycleEventArgs $event)
    {
        $this->createdAt = new \DateTime();
    }

    public function setUpdatedAtValue(LifecycleEventArgs $event)
    {
        $this->updatedAt = new \DateTime();
    }

    public function setDeletedAtValue(LifecycleEventArgs $event)
    {
        $this->deletedAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return ArrayCollection
     */
    public function getHotels()
    {
        return $this->hotels;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param ArrayCollection $hotels
     */
    public function setHotels(ArrayCollection $hotels): void
    {
        $this->hotels = $hotels;
    }


}