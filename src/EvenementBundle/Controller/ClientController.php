<?php

namespace EvenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
    public function ReadEAction()
    {
        $em= $this->getDoctrine()->getManager();
        $evenements=$em->getRepository("MainBundle:Evenement")->findAll();
        return $this->render('EvenementBundle:Evenement:readclient.html.twig', array(
            "evenements"=>$evenements

        ));
    }
    public function ReadMoreECAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $evenement=$em->getRepository("MainBundle:Evenement")->find($id);
        return $this->render('@Evenement/Evenement/readmoreclient.html.twig', array(
            "evenement"=>$evenement

        ));
    }
}
