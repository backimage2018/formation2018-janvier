<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="back_2018_ItemCaddy")
 * @ORM\Entity(repositoryClass="App\Repository\ItemCaddyRepository")
 */
class ItemCaddy
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Product")
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     *
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     *
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function total()
    {
        $total = 0;
        if ($products != null && count($products) > 0) {
            foreach ($products as $prod) {
                $total += $prod->getPrice();
            }
        }
        return $total;
    }
}
