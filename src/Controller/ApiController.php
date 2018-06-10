<?php

namespace App\Controller;

use App\Entity\Hotels;
use App\Entity\Versions;
use App\Service\VersionGrabber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    public function allHotels(VersionGrabber $versionGrabber)
    {
        $versionCheck = $versionGrabber->checkCallerVersion();
        if($versionCheck !== true) {
            return new JsonResponse($versionCheck);
        }

        $hotels = $this->getDoctrine()->getRepository(Hotels::class)->findAll();
        $serializer = new Serializer(array(new ObjectNormalizer()));
        $data = $serializer->normalize($hotels, 'json', array('attributes' => array('name', 'link')));
        return new JsonResponse($data);
    }

    public function needUpdate(Request $request)
    {
        $responseData = array();

        $callerVersion = $request->headers->get("API-VERSION");
        $version = $this->getDoctrine()->getRepository(Versions::class)->findOneBy(
            ['versionNumber' => $callerVersion]
        );

        if($version && $version->getAuthorized()) {
            $responseData["authorized"] = true;
        } else {
            $responseData["authorized"] = false;
        }

        $version = $this->getDoctrine()->getRepository(Versions::class)->findOneBy(
            [],
            ['versionNumber' => 'DESC']
        );

        $responseData["versionNumber"] = $version->getVersionNumber();

        return new JsonResponse($responseData);
    }

    public function checkUpdate(Request $request)
    {
        $responseData = array();

        $callerVersion = $request->headers->get("API-VERSION");
        $version = $this->getDoctrine()->getRepository(Versions::class)->findOneBy(
            ['versionNumber' => $callerVersion]
        );
        if($version && $version->getAuthorized()) {
            $responseData["authorized"] = true;
        } else {
            $responseData["authorized"] = false;
        }

        $version = $this->getDoctrine()->getRepository(Versions::class)->findOneBy(
            [],
            ['versionNumber' => 'DESC']
        );

        $responseData["versionNumber"] = $version->getVersionNumber();
        $responseData["link"] = "http://retrozone.pierreb.tk/" + $version + ".zip";

        return new JsonResponse([$responseData, $responseData]);
    }
}