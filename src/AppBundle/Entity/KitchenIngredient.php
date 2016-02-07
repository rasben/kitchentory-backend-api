<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KitchenIngredient
 *
 * @ORM\Table(name="kitchen_ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KitchenIngredientRepository")
 */
class KitchenIngredient
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
     * @ORM\ManyToOne(targetEntity="Kitchen")
     * @ORM\JoinColumn(name="kitchen_id", referencedColumnName="id")
     */
    private $kitchenID;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     */
    private $ingredientID;


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
     * Set kitchenID
     *
     * @param integer $kitchenID
     *
     * @return KitchenIngredient
     */
    public function setKitchenID($kitchenID)
    {
        $this->kitchenID = $kitchenID;

        return $this;
    }

    /**
     * Get kitchenID
     *
     * @return int
     */
    public function getKitchenID()
    {
        return $this->kitchenID;
    }

    /**
     * Set ingredientID
     *
     * @param integer $ingredientID
     *
     * @return KitchenIngredient
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
}

