<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="back_2018_Profile")
 * @ORM\Entity(repositoryClass="App\Repository\ProfileRepository")
 */
class Profile
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    // add your own fields
}
