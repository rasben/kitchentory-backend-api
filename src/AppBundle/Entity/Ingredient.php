<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 */
class Ingredient
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
     * @var int
     *
     * @ORM\Column(name="amount", type="integer", nullable=false, options={"default":0})
     */
    private $amount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="global", type="boolean", nullable=false, options={"default":0})
     */
    private $global;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categoryID;

    /**
     * @ORM\ManyToOne(targetEntity="Amount")
     * @ORM\JoinColumn(name="amount_id", referencedColumnName="id", nullable=false)
     */
    private $amountID;


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
     * Set amount
     *
     * @param integer $amount
     *
     * @return Ingredient
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set global
     *
     * @param integer $global
     *
     * @return Ingredient
     */
    public function setGlobal($global)
    {
        $this->global = $global;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get global
     *
     * @return int
     */
    public function getGlobal()
    {
        return $this->global;
    }


    /**
     * Set categoryID
     *
     * @param integer $categoryID
     *
     * @return Ingredient
     */
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    /**
     * Get categoryID
     *
     * @return int
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * Set amountID
     *
     * @param integer $amountID
     *
     * @return Ingredient
     */
    public function setAmountID($amountID)
    {
        $this->amountID = $amountID;

        return $this;
    }

    /**
     * Get amountID
     *
     * @return int
     */
    public function getAmountID()
    {
        return $this->amountID;
    }
}

