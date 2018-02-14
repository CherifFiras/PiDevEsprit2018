<?php

namespace InteractionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RechercheController extends Controller
{
    public function rechercheAction()
    {
        return $this->render('@Interaction/Default/recherche.html.twig');
    }
}
