<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="back_2018_Image")
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\File(mimeTypes={"image/jpeg","image/png"})
     */
    private $src;

    private $srcname;

    /**
     *
     * @return mixed
     */
    public function getSrcname()
    {
        return $this->srcname;
    }

    /**
     *
     * @param mixed $srcname
     */
    public function setSrcname($srcname)
    {
        $this->srcname = $srcname;
    }

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
    public function getId_product()
    {
        return $this->id_product;
    }

    /**
     *
     * @return mixed
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     *
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     *
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
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
     * @param mixed $id_product
     */
    public function setId_product($id_product)
    {
        $this->id_product = $id_product;
    }

    /**
     *
     * @param mixed $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }

    /**
     *
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     *
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }
}
