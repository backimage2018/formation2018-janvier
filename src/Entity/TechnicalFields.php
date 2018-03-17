<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Symfony\Component\Validator\Constraints as Assert;

trait TechnicalFields
{

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    protected $create_user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank()
     */
    protected $create_date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotBlank()
     */
    protected $deleted;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    protected $delete_user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank()
     */
    protected $delete_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    protected $update_user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank()
     */
    protected $update_date;

    /**
     *
     * @return mixed
     */
    public function getCreate_user()
    {
        return $this->create_user;
    }

    /**
     *
     * @return mixed
     */
    public function getCreate_date()
    {
        return $this->create_date;
    }

    /**
     *
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     *
     * @return mixed
     */
    public function getDelete_user()
    {
        return $this->delete_user;
    }

    /**
     *
     * @return mixed
     */
    public function getDelete_date()
    {
        return $this->delete_date;
    }

    /**
     *
     * @return mixed
     */
    public function getUpdate_user()
    {
        return $this->update_user;
    }

    /**
     *
     * @return mixed
     */
    public function getUpdate_date()
    {
        return $this->update_date;
    }

    /**
     *
     * @param mixed $create_user
     */
    public function setCreate_user($create_user)
    {
        $this->create_user = $create_user;
    }

    /**
     *
     * @param mixed $create_date
     */
    public function setCreate_date($create_date)
    {
        $this->create_date = $create_date;
    }

    /**
     *
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     *
     * @param mixed $delete_user
     */
    public function setDelete_user($delete_user)
    {
        $this->delete_user = $delete_user;
    }

    /**
     *
     * @param mixed $delete_date
     */
    public function setDelete_date($delete_date)
    {
        $this->delete_date = $delete_date;
    }

    /**
     *
     * @param mixed $update_user
     */
    public function setUpdate_user($update_user)
    {
        $this->update_user = $update_user;
    }

    /**
     *
     * @param mixed $update_date
     */
    public function setUpdate_date($update_date)
    {
        $this->update_date = $update_date;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->deleted = false;
        $this->create_date = new \DateTime("now");
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->update_date = new \DateTime("now");
    }

    /**
     * @ORM\PreRemove
     */
    public function onPreRemove()
    {
        // $this->deleted = true;
        // $this->delete_date = new \DateTime("now");
    }
}
