<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KitchenUser
 *
 * @ORM\Table(name="kitchen_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KitchenUserRepository")
 */
class KitchenUser
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
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=false)
     */
    private $roleID;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $userID;

    /**
     * @ORM\ManyToOne(targetEntity="Kitchen")
     * @ORM\JoinColumn(name="kitchen_id", referencedColumnName="id", nullable=false)
     */
    private $kitchenID;

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
     * Set roleID
     *
     * @param int $roleID
     *
     * @return KitchenUser
     */
    public function setRoleID($roleID)
    {
        $this->roleID = $roleID;

        return $this;
    }

    /**
     * Get roleID
     *
     * @return string
     */
    public function getRoleID()
    {
        return $this->roleID;
    }

    /**
     * Set userID
     *
     * @param int $userID
     *
     * @return KitchenUser
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * Get userID
     *
     * @return string
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set kitchenID
     *
     * @param int $kitchenID
     *
     * @return KitchenUser
     */
    public function setKitchenID($kitchenID)
    {
        $this->kitchenID = $kitchenID;

        return $this;
    }

    /**
     * Get kitchenID
     *
     * @return string
     */
    public function getKitchenID()
    {
        return $this->kitchenID;
    }
}

