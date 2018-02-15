<?php

namespace InteractionBundle\Controller;

use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RechercheController extends Controller
{

    public function rechercheAction()
    {
        return $this->render('@Interaction/Default/recherche.html.twig');
    }

    public function resultatAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $users = $manager->getRepository(User::class)->findAll();
        $serializer=new Serializer(array(new ObjectNormalizer()));
        $data=$serializer->normalize($users);
        return new JsonResponse($data);
    }
}
