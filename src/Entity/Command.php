<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="back_2018_Command")
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 */
class Command
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    // add your own fields
}
