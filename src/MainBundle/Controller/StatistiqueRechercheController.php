<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatistiqueRechercheController extends Controller
{
    public function generaleAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $all = $manager->getRepository("MainBundle:Recherche")->countAll();
        $allByYear = $manager->getRepository("MainBundle:Recherche")->countAllByYear();
        $allByMonth = $manager->getRepository("MainBundle:Recherche")->countAllByMonth();
        $allByToday = $manager->getRepository("MainBundle:Recherche")->countAllByToday();
        $statByCountry = $manager->getRepository("MainBundle:Recherche")->statByCountry();
        $statByTunis = $manager->getRepository("MainBundle:Recherche")->statByTunis();
        return $this->render("@Main/Default/generalStatistiqueRecherche.html.twig",array(
            "all"=>$all,"allByYear"=>$allByYear,"allByMonth" => $allByMonth,"allByToday"=>$allByToday,"statByCountry"=>$statByCountry,"statByTunis"=>$statByTunis
        ));
    }

}
