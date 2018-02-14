<?php

namespace ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProfilBundle:Default:profil.html.twig');
    }

    public function paramsInfoAction()
    {
        return $this->render('ProfilBundle:Default:paraminfo.html.twig');
    }
}
