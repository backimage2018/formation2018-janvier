<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="back_2018_Faq")
 * @ORM\Entity(repositoryClass="App\Repository\FaqRepository")
 */
class Faq
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
    private $question;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $response;

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
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
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
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     *
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }
}
