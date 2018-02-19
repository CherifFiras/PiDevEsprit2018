<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function testAction()
    {
        return $this->render('MainBundle:Main:test.html.twig', array(
            // ...
        ));
    }

}
