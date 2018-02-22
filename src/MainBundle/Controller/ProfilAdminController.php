<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilAdminController extends Controller
{
    public function indexAction()
    {
        $admin = $this->container->get('security.token_storage')->getToken()->getUser();

        return $this->render('MainBundle:ProfilAdmin:indexAdmin.html.twig', array(
            'curr_user' => $admin
        ));
    }

    public function utilisateursAction()
    {
        $admin = $this->container->get('security.token_storage')->getToken()->getUser();

        return $this->render('MainBundle:ProfilAdmin:utilisateursAdmin.html.twig', array(
            'curr_user' => $admin
        ));
    }

    public function statProfilAction()
    {
        $admin = $this->container->get('security.token_storage')->getToken()->getUser();

        return $this->render('MainBundle:ProfilAdmin:statistiqueAdmin.html.twig', array(
            'curr_user' => $admin
        ));
    }
}
