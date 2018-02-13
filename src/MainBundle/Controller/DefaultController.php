<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function ForumAction()
    {
        return $this->render('MainBundle:Default:forum.html.twig');
    }


    public function EspacesAction()
    {
        return $this->render('MainBundle:Default:espaces.html.twig');
    }


}
