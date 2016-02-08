<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeIngredient
 *
 * @ORM\Table(name="recipe_ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeIngredientRepository")
 */
class RecipeIngredient
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
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id", nullable=false)
     */
    private $recipeID;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id", nullable=false)
     */
    private $ingredientID;

    /**
     * @ORM\ManyToOne(targetEntity="Amount")
     * @ORM\JoinColumn(name="amount_id", referencedColumnName="id", nullable=true)
     */
    private $amountID;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer", nullable=false, options={"default":0})
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
     * @return RecipeIngredient
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
     * Set ingredientID
     *
     * @param integer $ingredientID
     *
     * @return RecipeIngredient
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

