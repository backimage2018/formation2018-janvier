<?php
// src/Repository/UserRepository.php
namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * Load one product
     */
    public function loadOne($id)
    {
        $q = $this->createQueryBuilder('p')
            ->join('p.image', 'i')
            ->join('p.reviews', 'r')
            ->addSelect('i')
            ->addSelect('r')
            ->where('p.id = :pid')
            ->setParameter(':pid', $id)
            ->getQuery();
        $res = $q->getArrayResult();
        if (count($res) > 0)
            return $res[0];
        return null;
    }

    /**
     * Load all products with -..% tag
     */
    public function loadDealsOfTheDay()
    {
        $q = $this->createQueryBuilder('p')
            ->join('p.image', 'i')
            ->addSelect('i')
            ->where('p.isActive = :isactive')
            ->andWhere('p.sale IS NOT NULL')
            ->setParameter(':isactive', true)
            ->getQuery();
        $res = $q->getArrayResult();
        return $res;
    }

    /**
     * Load 4 random products with no specifications
     */
    public function loadPickedForYou()
    {
        $products = $this->createQueryBuilder('p')
            ->join('p.image', 'i')
            ->addSelect('i')
            ->where('p.isActive = :isactive')
            ->setParameter(':isactive', true)
            ->getQuery()
            ->getArrayResult();
        shuffle($products);
        return array_slice($products, 0, 4, true);
    }

    /**
     * Load 7 random products with 'new' tag
     */
    public function loadLatestProducts()
    {
        $products = $this->createQueryBuilder('p')
            ->join('p.image', 'i')
            ->addSelect('i')
            ->where('p.isActive = :isactive')
            ->andWhere('p.new  = :new')
            ->setParameter(':isactive', true)
            ->setParameter(':new', 'new')
            ->getQuery()
            ->getArrayResult();
        shuffle($products);
        return array_slice($products, 0, 7, true);
    }
}
?>