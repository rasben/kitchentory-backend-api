<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * IngredientName
 *
 * @ORM\Table(name="ingredient_name", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="uq_name_language", columns={"name", "language_id"})})
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientNameRepository")
 */
class IngredientName
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     */
    private $ingredientID;

    /**
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     */
    private $languageID;

    /**
     * @var boolean
     *
     * @ORM\Column(name="master", type="boolean")
     */
    private $master;

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
     * @return IngredientName
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

