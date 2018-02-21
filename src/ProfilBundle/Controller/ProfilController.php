<?php

namespace ProfilBundle\Controller;

use MainBundle\Entity\CentreInteret;
use MainBundle\Entity\Emploi;
use MainBundle\Entity\Scolarite;
use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
        //----------------
        $form=$this->createFormBuilder($u)
            ->add('imageFile', VichImageType::class)
            ->add('Ajouter',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if (($form->isSubmitted())&&($form->isValid()))
        {
            $u=$form->getData();
            $em->flush();
            return $this->redirectToRoute('paramInfo');
        }
        //----------------
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
            //$user->setPhotoprofil("unknownphoto.jpg");
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
            'iduser' => $u->getId(),'us' => $u,'form'=>$form->createView()
        ));

    }

    public function centreintAction(Request $request)
    {
        $u= $this->container->get('security.token_storage')->getToken()->getUser();
        //-----------------Afficher les centres d'interet
        $em = $this->getDoctrine()->getManager();
        $cen_user_film = $em->getRepository(CentreInteret::class)->findBy(array('user' => $u->getId(),'type' => 'film'));
        $cen_user_serie = $em->getRepository(CentreInteret::class)->findBy(array('user' => $u->getId(),'type' => 'serie'));

        $newc = new CentreInteret();
        if ($request->isMethod('POST'))
        {
            if ($request->request->has('idc')) {
                $delc= $em->getRepository(CentreInteret::class)->find($request->get("idc"));
                $em->remove($delc);
                $em->flush();
                return $this->redirectToRoute("centreinteret");
            }
            if ($request->request->has('newcentrefilm'))
            {
                $newc->setType($request->get("type"));
                $newc->setContenu($request->get("newcentrefilm"));
                $newc->setUser($u);
                $em->persist($newc);
                $em->flush();
                return $this->redirectToRoute('centreinteret');
            }
            if ($request->request->has('newcentreserie'))
            {
                $newc->setType($request->get("type"));
                $newc->setContenu($request->get("newcentreserie"));
                $newc->setUser($u);
                $em->persist($newc);
                $em->flush();
                return $this->redirectToRoute('centreinteret');
            }

        }

        //-----------------
        return $this->render('ProfilBundle:Default:centreinteret.html.twig', array(
            'iduser' => $u->getId(),'centresfilm' => $cen_user_film,'centresserie' => $cen_user_serie
        ));
    }

    public function eduEmpAction(Request $request)
    {
        $u= $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $scol = $em->getRepository(Scolarite::class)->findBy(array('user' => $u->getId()),array('dateDebut' => 'ASC'));
        $empl = $em->getRepository(Emploi::class)->findBy(array('user' => $u->getId()),array('dateDebut' => 'ASC'));


        //-----------------------
        if ($request->isMethod('POST'))
        {
            if ($request->request->has('idscol')) {
                $delscol= $em->getRepository(Scolarite::class)->find($request->get("idscol"));
                $em->remove($delscol);
                $em->flush();
                return $this->redirectToRoute("educationemploi");
            }
            if ($request->request->has('nometab'))
            {
                $newsc = new Scolarite();
                $newsc->setContenu($request->get("nometab"));
                $newsc->setDateDebut($request->get("datedeb"));
                $newsc->setDateFin($request->get("datefin"));
                $newsc->setUser($u);
                $em->persist($newsc);
                $em->flush();
                return $this->redirectToRoute('educationemploi');
            }
            if ($request->request->has('nomemp'))
            {
                $newem = new Emploi();
                $newem->setContenu($request->get("nomemp"));
                $newem->setDateDebut($request->get("datedebe"));
                $newem->setDateFin($request->get("datefine"));
                $newem->setUser($u);
                $em->persist($newem);
                $em->flush();
                return $this->redirectToRoute('educationemploi');
            }
            if ($request->request->has('idemp')) {
                $delemp= $em->getRepository(Emploi::class)->find($request->get("idemp"));
                $em->remove($delemp);
                $em->flush();
                return $this->redirectToRoute("educationemploi");
            }


        }
        //-----------------------
        return $this->render('ProfilBundle:Default:educationemploi.html.twig', array(
            'iduser' => $u->getId(),'scolarite' => $scol,'emploi'=>$empl
        ));
    }

    public function updateEmpAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->get("idemp");
        $emp = $em->getRepository(Emploi::class)->find($id);

        if ($request->isMethod('POST')) {
            if ($request->request->has('idemp')) {
                $emp->setContenu(($request->get('contenu')));
                $emp->setDateDebut(($request->get('datde')));
                $emp->setDateFin(($request->get('datfe')));
                $em->persist($emp);
                $em->flush();
            }
            return $this->redirectToRoute('educationemploi');

        }
        return $this->redirectToRoute('educationemploi');
    }

    public function updateScolAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->get("idscol");
        $sco = $em->getRepository(Scolarite::class)->find($id);

        if ($request->isMethod('POST')) {
            if ($request->request->has('idscol')) {
                $sco->setContenu(($request->get('contenu')));
                $sco->setDateDebut(($request->get('datds')));
                $sco->setDateFin(($request->get('datfs')));
                $em->persist($sco);
                $em->flush();
            }
            return $this->redirectToRoute('educationemploi');

        }
        return $this->redirectToRoute('educationemploi');
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
