<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShoppinglistIngredient
 *
 * @ORM\Table(name="shoppinglist_ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShoppinglistIngredientRepository")
 */
class ShoppinglistIngredient
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
     * @ORM\ManyToOne(targetEntity="Shoppinglist")
     * @ORM\JoinColumn(name="shoppinglist_id", referencedColumnName="id")
     */
    private $shoppinglistID;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     */
    private $ingredientID;

    /**
     * @ORM\ManyToOne(targetEntity="Amount")
     * @ORM\JoinColumn(name="amount_id", referencedColumnName="id")
     */
    private $amountID;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;


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
     * Set shoppinglistID
     *
     * @param integer $shoppinglistID
     *
     * @return ShoppinglistIngredient
     */
    public function setShoppinglistID($shoppinglistID)
    {
        $this->shoppinglistID = $shoppinglistID;

        return $this;
    }

    /**
     * Get shoppinglistID
     *
     * @return int
     */
    public function getShoppinglistID()
    {
        return $this->shoppinglistID;
    }

    /**
     * Set ingredientID
     *
     * @param integer $ingredientID
     *
     * @return ShoppinglistIngredient
     */
    public function setIngredientID($ingredientID)
    {
        $this->ingredientID = $ingredientID;

        return $this;
    }

    /**
     * Get ingredientID
     *
     * @return int
     */
    public function getIngredientID()
    {
        return $this->ingredientID;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return ShoppinglistAmount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
}

