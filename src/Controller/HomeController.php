<?php
namespace App\Controller;

use App\Entity\Hotels;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        $hotels = $this->getDoctrine()->getRepository(Hotels::class)->findAll();
        return $this->render('base.html.twig', array('hotels' => $hotels));
    }
}