<?php

namespace MainBundle\Controller;

use MainBundle\Entity\User;
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
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('MainBundle:ProfilAdmin:utilisateursAdmin.html.twig', array(
            'curr_user' => $admin,'users'=>$users
        ));
    }

    public function utilisateurSignalAction()
    {
        $admin = $this->container->get('security.token_storage')->getToken()->getUser();

        return $this->render('MainBundle:ProfilAdmin:utilSignal.html.twig', array(
            'curr_user' => $admin
        ));
    }

    public function statProfilAction()
    {
        $admin = $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $nb_users = $em->getRepository(User::class)->findByRole("ROLE_SUPER_ADMIN");
        //---------
        $nb_users_actif = $em->getRepository(User::class)->findActif("ROLE_SUPER_ADMIN");
        $nb_users_inactif = $em->getRepository(User::class)->findInactif("ROLE_SUPER_ADMIN");
        //-----------
        $pourcentage_actif = ($nb_users_actif*100)/$nb_users;
        $pourcentage_inactif = ($nb_users_inactif*100)/$nb_users;
        //--------------
        $nb_fb = $em->getRepository(User::class)->findByFacebook("ROLE_SUPER_ADMIN");
        $nb_twi = $em->getRepository(User::class)->findByTwitter("ROLE_SUPER_ADMIN");
        $nb_inst = $em->getRepository(User::class)->findByInstagram("ROLE_SUPER_ADMIN");

        return $this->render('MainBundle:ProfilAdmin:statistiqueAdmin.html.twig', array(
            'curr_user' => $admin,'nb_users'=>$nb_users,'actif'=>$pourcentage_actif,'inactif'=>$pourcentage_inactif,
            'nb_actif'=>$nb_users_actif,'nb_inactif'=>$nb_users_inactif,'nb_fb'=>$nb_fb,'nb_twi'=>$nb_twi,
            'nb_inst'=>$nb_inst
        ));
    }
}
