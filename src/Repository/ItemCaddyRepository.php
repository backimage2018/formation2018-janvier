<?php
namespace App\Repository;

use App\Entity\ItemCaddy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ItemCaddyRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ItemCaddy::class);
    }
    
    /*
     * public function findBySomething($value)
     * {
     * return $this->createQueryBuilder('c')
     * ->where('c.something = :value')->setParameter('value', $value)
     * ->orderBy('c.id', 'ASC')
     * ->setMaxResults(10)
     * ->getQuery()
     * ->getResult()
     * ;
     * }
     */
}
