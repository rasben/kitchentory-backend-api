<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InventoryIngredient
 *
 * @ORM\Table(name="inventory_ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InventoryIngredientRepository")
 */
class InventoryIngredient
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
     * @ORM\ManyToOne(targetEntity="Inventory")
     * @ORM\JoinColumn(name="inventory_id", referencedColumnName="id")
     */
    private $inventoryID;

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
     * Set inventoryID
     *
     * @param integer $inventoryID
     *
     * @return InventoryIngredient
     */
    public function setInventoryID($inventoryID)
    {
        $this->inventoryID = $inventoryID;

        return $this;
    }

    /**
     * Get inventoryID
     *
     * @return int
     */
    public function getInventoryID()
    {
        return $this->inventoryID;
    }

    /**
     * Set ingredientID
     *
     * @param integer $ingredientID
     *
     * @return InventoryIngredient
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

