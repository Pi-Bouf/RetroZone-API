<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 19/05/2018
 * Time: 18:54
 */

namespace App\Entity;


class Hotels
{
    private $id;
    private $name;
    private $link;
    private $user_id;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;
    private $user;

    public function __construct()
    {
    }

    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }

    public function setDeletedAtValue()
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
}