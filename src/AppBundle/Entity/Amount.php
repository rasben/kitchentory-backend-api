<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amount
 *
 * @ORM\Table(name="amount")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AmountRepository")
 */
class Amount
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true,  nullable=false)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="AmountType")
     * @ORM\JoinColumn(name="amount_type_id", referencedColumnName="id",  nullable=false)
     */
    private $amountTypeID;

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
     * @return Amount
     */
    public function setName($name)
    {
        $this->name = $name;

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

}

