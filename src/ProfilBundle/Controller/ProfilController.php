<?php

namespace ProfilBundle\Controller;

use MainBundle\Entity\CentreInteret;
use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($u->getId());
        //Save?
        if ($request->isMethod('POST')) {
            //Mettre a jour
            $user->setNom($request->get('nom'));
            $user->setPrenom($request->get('prenom'));
            $user->setGenre($request->get('gen'));
            $d = new \DateTime($request->get('datetimepicker'));
            $user->setDateNaissance($d);
            $user->setPays($request->get('pays'));
            $user->setVille($request->get('ville'));
            $user->setRegion($request->get('region'));
            $user->setTel($request->get('tel'));
            $user->setPlaceNaiss($request->get('placenaiss'));
            $user->setRelegion($request->get('rel'));
            $user->setApropos($request->get('apropos'));
            $user->setFacebook($request->get('facebook'));
            $user->setTwitter($request->get('twitter'));
            $user->setInstagram($request->get('instagram'));
            //----------------------PhotoUpload

            //--------------------------------
            $em->persist($user);
            $em->flush();
            //Rederiger vers read
            return $this->redirectToRoute('paramInfo');
        }
        // Recuperation des donnees
        //Remplir form
        return $this->render('ProfilBundle:Default:paraminfo.html.twig', array(
            'iduser' => $u->getId()
        ));

    }

    public function centreintAction(Request $request)
    {
        $u= $this->container->get('security.token_storage')->getToken()->getUser();
        //-----------------Afficher les centres d'interet
        $em = $this->getDoctrine()->getManager();
        $cen_user = $em->getRepository(CentreInteret::class)->findBy(array('user' => $u->getId(),'type' => 'film'));

        $newc = new CentreInteret();
        if ($request->isMethod('POST'))
        {
            if ($request->request->has('idc')) {
                $delc= $em->getRepository(CentreInteret::class)->find($request->get("idc"));
                $em->remove($delc);
                $em->flush();
                return $this->redirectToRoute("centreinteret");
            }
            else
            {
                $newc->setType($request->get("type"));
                $newc->setContenu($request->get("newcentre"));
                echo $request->get('user');
                $newc->setUser($u);
                $em->persist($newc);
                $em->flush();
                return $this->redirectToRoute('centreinteret');
            }

        }

        //-----------------
        return $this->render('ProfilBundle:Default:centreinteret.html.twig', array(
            'iduser' => $u->getId(),'centres' => $cen_user
        ));
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
