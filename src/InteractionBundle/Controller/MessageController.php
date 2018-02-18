<?php

namespace InteractionBundle\Controller;

use MainBundle\Entity\Message;
use MainBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;

class MessageController extends Controller
{
    public function getMessagesAction(Request $request)
    {
        $touser= $request->get("touser");
        $last = $request->get("last");
        $manager = $this->getDoctrine()->getManager();
        $user= $this->container->get('security.token_storage')->getToken()->getUser();
        $messageList = $manager->getRepository("MainBundle:Message")->fetchMessages($user,$touser,$last);

        $normalizer = new ObjectNormalizer();
        //$normalizer->setIgnoredAttributes(array('interets'));

        $serializer=new Serializer(array(new DateTimeNormalizer(),$normalizer));
        $data=$serializer->normalize($messageList, null, array('attributes' => array('id','sender'=>['id'], 'receiver' => ['id'],'text','date')));
        return new JsonResponse($data);
    }

    public function sendMessageAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $touserid= $request->get("touser");
        $text = $request->get("text");
        $touser = $manager->getRepository("MainBundle:User")->find($touserid);
        $user= $this->container->get('security.token_storage')->getToken()->getUser();
        $message = new Message();
        $message->setDate(new \DateTime());
        $message->setSender($user);
        $message->setReceiver($touser);
        $message->setText($text);
        $manager->persist($message);
        $manager->flush();
        return new JsonResponse("DONE !!!");
    }
}
