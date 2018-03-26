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
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     *
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     *
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     *
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

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
        if ($product != null && $qty > 0) {
            $total = $product->getPrice() * $qty;
        }
        return $total;
    }
}
