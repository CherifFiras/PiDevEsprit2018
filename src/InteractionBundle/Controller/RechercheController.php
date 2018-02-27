<?php

namespace InteractionBundle\Controller;

use MainBundle\Entity\CentreInteret;
use MainBundle\Entity\Emploi;
use MainBundle\Entity\Recherche;
use MainBundle\Entity\User;
use MainBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Ldap\Adapter\ExtLdap\Collection;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\DateTime;

class RechercheController extends Controller
{

    public function rechercheAction()
    {
        return $this->render('@Interaction/Default/recherche.html.twig');
    }

    public function resultatAction(Request $request)
    {

        $manager = $this->getDoctrine()->getManager();
        $genre = $request->get("gender");
        $age = $request->get("age");
        if($age == null)
        {
            $age[0] = 18;
            $age[1] = 60;
        }
        $occupation = $request->get("occupation");
        $religion = $request->get("religion");
        $pays = $request->get("pays");
        $ville = $request->get("ville");
        $region = $request->get("region");
        $films = $request->get("films");
        $series = $request->get("series");
        $livres = $request->get("livres");
        $u= $this->container->get('security.token_storage')->getToken()->getUser();
        $this->saveRecherche($u,$genre,$age[0],$age[1],$occupation,$religion,$pays,$ville,$region);
        $datemin = new \DateTime("now -$age[0] year");
        $datemax = new \DateTime("now -$age[1] year");
        $userList = $manager->getRepository("MainBundle:User")->resultusers($u->getId(),$datemin->format("Y-m-d"),$datemax->format("Y-m-d"),$genre,$occupation,$religion,$pays,$ville,$region,$films,$series,$livres);


        $normalizer = new ObjectNormalizer();
        //$normalizer->setIgnoredAttributes(array('user'));

        $serializer=new Serializer(array(new DateTimeNormalizer(),$normalizer));
        $data=$serializer->normalize($userList, null, array('attributes' => array('id','nom','prenom')));
        return new JsonResponse($data);


    }

    private function saveRecherche($u,$genre,$agemin,$agemax,$occupation,$religion,$pays,$ville,$region)
    {
        $manager = $this->getDoctrine()->getManager();
        if($occupation != null)
            $occupation = implode(",",$occupation);
        if($religion != null)
            $religion = implode(",",$religion);
        if($pays != null)
            $pays = implode(",",$pays);
        if($ville != null)
            $ville = implode(",",$ville);
        if($region)
            $region = implode(",",$region);

        $recherche = new Recherche();
        $recherche->setUser($u);
        $recherche->setDate(new \DateTime("now"));
        $recherche->setGenre($genre);
        $recherche->setAgeMin($agemin);
        $recherche->setAgeMax($agemax);
        $recherche->setOccupation($occupation);
        $recherche->setRelegion($religion);
        $recherche->setPays($pays);
        $recherche->setVille($ville);
        $recherche->setRegion($region);

        $manager->persist($recherche);
        $manager->flush();
    }
}
