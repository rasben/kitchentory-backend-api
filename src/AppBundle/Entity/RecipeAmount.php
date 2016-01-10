<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeAmount
 *
 * @ORM\Table(name="recipe_amount")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeAmountRepository")
 */
class RecipeAmount
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
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    private $recipeID;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     */
    private $integredientID;

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
     * Set recipeID
     *
     * @param integer $recipeID
     *
     * @return RecipeAmount
     */
    public function setRecipeID($recipeID)
    {
        $this->recipeID = $recipeID;

        return $this;
    }

    /**
     * Get recipeID
     *
     * @return int
     */
    public function getRecipeID()
    {
        return $this->recipeID;
    }

    /**
     * Set integredientID
     *
     * @param integer $integredientID
     *
     * @return RecipeAmount
     */
    public function setIntegredientID($integredientID)
    {
        $this->integredientID = $integredientID;

        return $this;
    }

    /**
     * Get integredientID
     *
     * @return int
     */
    public function getIntegredientID()
    {
        return $this->integredientID;
    }

    /**
     * Set amountID
     *
     * @param integer $amountID
     *
     * @return RecipeAmount
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

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return RecipeAmount
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

