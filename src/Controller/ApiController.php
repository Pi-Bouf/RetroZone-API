<?php

namespace App\Controller;

use App\Entity\Hotels;
use App\Service\VersionGrabber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
}