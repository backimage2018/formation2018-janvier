<?php
namespace App\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;

class DeleteListener
{

    public function preFlush(PreFlushEventArgs $event)
    {
        $em = $event->getEntityManager();
        
        foreach ($em->getUnitOfWork()->getScheduledEntityDeletions() as $object) {
            
            if (method_exists($object, "getDelete_date")) {
                if ($object->getDelete_date() instanceof \Datetime) {
                    
                    var_dump("physicaly deleted " . $object->getDelete_date()->format("d-m-Y H:i:s"));
                    continue;
                } else {
                    var_dump("virtualy deleted");
                    $object->setDelete_date(new \DateTime());
                    $object->setDeleted(true);
                    $em->merge($object);
                    $em->persist($object);
                }
            }
        }
    }
}