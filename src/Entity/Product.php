<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="back_2018_Product")
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product implements \Serializable
{

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type(
     * type="float",
     * message="The value {{ value }} is not a valid {{ type }}")
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Type(type="float", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $oldprice;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $notation;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    private $sale;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $new;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $detail;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $availability;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $brand;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $hour;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="int", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $minute;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="int", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $second;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $sex;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @Assert\Type(type="bool", message="The value {{ value }} is not a valid {{ type }}")
     */
    private $isActive;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="product", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $reviews;

    /**
     *
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     *
     * @param mixed $reviews
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     *
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     *
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     *
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     *
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     *
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     *
     * @param mixed $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     *
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     *
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     *
     * @param mixed $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    /**
     *
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     *
     * @return mixed
     */
    public function getOldprice()
    {
        return $this->oldprice;
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
    public function getHour()
    {
        return $this->hour;
    }

    /**
     *
     * @return mixed
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     *
     * @return mixed
     */
    public function getSecond()
    {
        return $this->second;
    }

    /**
     *
     * @param mixed $oldprice
     */
    public function setOldprice($oldprice)
    {
        $this->oldprice = $oldprice;
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
     * @param mixed $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     *
     * @param mixed $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     *
     * @param mixed $second
     */
    public function setSecond($second)
    {
        $this->second = $second;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     *
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     *
     * @return mixed
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     *
     * @param mixed $sale
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
    }

    /**
     *
     * @param mixed $new
     */
    public function setNew($new)
    {
        $this->new = $new;
    }

    /**
     *
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function serialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }

    public function unserialize($serialized)
    {}
}
?>