<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AmountType
 *
 * @ORM\Table(name="amount_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AmountTypeRepository")
 */
class AmountType
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
     * @ORM\Column(name="name", type="string", length=255, unique=true, nullable=false)
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity="Amount")
     * @ORM\JoinColumn(name="master_amount_id", referencedColumnName="id", nullable=true)
     */
    private $masterAmountID;

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

