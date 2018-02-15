<?php

namespace ProfilBundle\Controller;

use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller
{
    public function indexAction()
    {
        $u= $this->container->get('security.token_storage')->getToken()->getUser();

        return $this->render('ProfilBundle:Default:profil.html.twig', array(
            'iduser' => $u->getId()
        ));
    }

    public function paramsInfoAction(Request $request)
    {
        $u= $this->container->get('security.token_storage')->getToken()->getUser();
        /*
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($u->getId());
        //Save?
        if ($request->isMethod('POST')) {
            //Mettre a jour
            $user->setNom($request->get('pays'));
            $user->setPrenom($request->get('pays'));
            $user->setGenre($request->get('pays'));
            $user->setDateNaissance($request->get('pays'));
            $user->setPays($request->get('pays'));
            $user->setVille($request->get('pays'));
            $user->setRegion($request->get('pays'));
            $user->setTel($request->get('pays'));
            $user->setPlaceNaiss($request->get('pays'));
            $user->setRelegion($request->get('pays'));
            $user->setApropos($request->get('pays'));
            $user->setFacebook($request->get('pays'));
            $user->setTwitter($request->get('pays'));
            $user->setInstagram($request->get('pays'));

            $user->setPays($request->get('pays'));
            $user->setLib($request->get('libelle'));
            $em->persist($user);
            $em->flush();
            //Rederiger vers read
            return $this->redirectToRoute('read');
        }
        // Recuperation des donnees
        //Remplir form
        return $this->render('ParcBundle:Modele:update.html.twig', array(
            'user' => $user
        ));
        */
        return $this->render('ProfilBundle:Default:paraminfo.html.twig');
    }

    public function albumAction()
    {
        return $this->render('ProfilBundle:Default:album.html.twig');
    }

    public function AproposAction()
    {
        return $this->render('ProfilBundle:Default:apropos.html.twig');
    }

    public function listPhotoAction()
    {
        return $this->render('ProfilBundle:Default:listphoto.html.twig');
    }
}
