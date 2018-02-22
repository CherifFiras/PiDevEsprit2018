<?php

namespace InteractionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class NotificationController extends Controller
{
    public function getMessageNotificationAction()
    {
        $manager = $this->get('mgilet.notification');
        $user= $this->container->get('security.token_storage')->getToken()->getUser();

        $notifications = $manager->getUnseenNotifications($user);

        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('notification','notifiableEntity','notifiableNotifications'));
        $serializer=new Serializer(array(new DateTimeNormalizer(),$normalizer));
        $data=$serializer->normalize($notifications);
        return new JsonResponse($data);
    }
}
