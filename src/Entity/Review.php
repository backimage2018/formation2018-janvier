<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="back_2018_Review")
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $notation;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $comment;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank()
     */
    private $date_creation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="reviews")
     * @ORM\JoinColumn(nullable=true)
     */
    private $product;

    /**
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
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
    public function getNotation()
    {
        return $this->notation;
    }

    /**
     *
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     *
     * @return mixed
     */
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     *
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     *
     * @param mixed $id_user
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
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
     * @param mixed $notation
     */
    public function setNotation($notation)
    {
        $this->notation = $notation;
    }

    /**
     *
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     *
     * @param mixed $date_creation
     */
    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;
    }
}
