<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Kitchen
 *
 * @ORM\Table(name="kitchen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KitchenRepository")
 *
 * @ExclusionPolicy("all") 
 */
class Kitchen
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Expose
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     * @Expose
     */
    private $location;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Kitchen
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Kitchen
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the formatted kitchen data to display
     *
     * @param $separator: the separator between name and location (default: ' ')
     * @return String
     * @VirtualProperty
     */
    
    /*
    public function getKitchenData($separator = ' '){
        if($this->getName()!=null && $this->getLocation()!=null){
            return 'lol';
        }
        else{
            return $this->getId();
        }
    }
    */
}

