<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatistiqueRechercheController extends Controller
{
    public function generaleAction()
    {
        return $this->render("@Main/Default/generalStatistiqueRecherche.html.twig");
    }
}
