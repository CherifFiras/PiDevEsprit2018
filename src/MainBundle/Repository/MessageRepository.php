<?php

namespace MainBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function fetchMessages($user,$touser,$last)
    {
        $users = array($user,$touser);
        $qb = $this->createQueryBuilder('m');
        $qb->andWhere("m.receiver in (:ur)")->setParameter(":ur",$users);
        $qb->andWhere("m.sender in (:us)")->setParameter(":us",$users);
        $qb->orderBy("m.date","ASC");
        if($last != 0)
            $qb->andWhere("m.id > :la")->setParameter(":la",$last);
        return $qb->getQuery()->execute();
    }

    public function fetchAllMessages($user,$ulist)
    {
        $list = new ArrayCollection();
        $qu = $this->createQueryBuilder('m');
        $qu->andWhere('m.receiver in (:ur)')->setParameter(":ur",$user);
        $qu->andWhere('m.sender in (:ul)')->setParameter(":ul",$ulist);
        $qu->orderBy("m.date","DESC");
        $qu->groupBy('m.sender');
        $senders = $qu->getQuery()->execute();
        foreach ($senders as $sender)
        {
            $qb = $this->createQueryBuilder('m');
            $qb->join("m.sender","u","WITH");
            $qb->AddSelect("u.nom");
            $qb->AddSelect("u.prenom");
            $qb->AddSelect("u.image");
            $qb->andWhere("m.receiver in (:ur)")->setParameter(":ur",$user);
            $qb->andWhere("m.sender in (:us)")->setParameter(":us",$sender->getSender());
            $qb->orderBy("m.date","DESC");
            $qb->setMaxResults(1);
            $list->add($qb->getQuery()->getSingleResult());
        }

        return $list;

    }
}
