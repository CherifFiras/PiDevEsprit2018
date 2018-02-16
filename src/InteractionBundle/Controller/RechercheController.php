<?php

namespace InteractionBundle\Controller;

use MainBundle\Entity\CentreInteret;
use MainBundle\Entity\Emploi;
use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Ldap\Adapter\ExtLdap\Collection;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RechercheController extends Controller
{

    public function rechercheAction()
    {
        return $this->render('@Interaction/Default/recherche.html.twig');
    }

    public function resultatAction(Request $request)
    {
        $userList = new Collection();
        $manager = $this->getDoctrine()->getManager();
        $genre = $request->get("gender");
        $occupation = $request->get("occupation");
        $users = $manager->getRepository(User::class)->findBy(array("genre"=>$genre));

        foreach ($occupation as $o)
        {
            $u = $manager->getRepository(Emploi::class)->findBy(array());
        }

        return $this->render('@Interaction/Default/index.html.twig',array(
            "occupation"=>$occupation
        ));
    }
}
