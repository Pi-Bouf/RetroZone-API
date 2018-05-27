<?php

namespace App\Service;

use App\Entity\Versions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

class VersionGrabber
{
    private $requestStack;
    private $em;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;
    }

    public function checkCallerVersion()
    {
        if($_SERVER['APP_ENV'] == "dev") {
            return true;
        }

        $request = $this->requestStack->getCurrentRequest();
        $callerVersion = $request->headers->get("API-VERSION");
        if ($callerVersion) {
            $version = $this->em->getRepository(Versions::class)->findOneBy(
                ['versionNumber' => $callerVersion]
            );
            if($version && $version->getAuthorized()) {
                return true;
            } else {
                return array("error" => "You client version is not authorized ! Please, update your browser.");
            }
        } else {
            return array("error" => "You can't use this api.");
        }
    }
}