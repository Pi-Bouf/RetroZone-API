<?php

namespace App\Entity;


class Versions
{
    private $id;
    private $versionNumber;
    private $releaseDate;
    private $authorized;

    public function getVersionNumber()
    {
        return $this->versionNumber;
    }

    public function getAuthorized()
    {
        return $this->authorized;
    }
}