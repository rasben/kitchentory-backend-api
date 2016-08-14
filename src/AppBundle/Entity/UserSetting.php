<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * UserSetting
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserSettingRepository")
 */
class UserSetting {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $userID;

    /**
     * @ORM\ManyToOne(targetEntity="Kitchen")
     * @ORM\JoinColumn(name="default_kitchen_id", referencedColumnName="id", nullable=true)
     */
    private $defaultKitchenID;

    /**
     * @var int
     *
     * @ORM\Column(name="auto_open_default_kitchen", type="boolean", nullable=false, options={"default":1})
     */
    private $autoOpenDefaultKitchen;

    /**
     * @var int
     *
     * @ORM\Column(name="moderator", type="boolean", nullable=false, options={"default":0})
     */
    private $moderator;

    /**
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_code", referencedColumnName="code", nullable=false)
     */
    private $languageCode;



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
     * Get userID
     *
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Get defaultKitchenID
     *
     * @return int
     */
    public function getDefaultKitchenID()
    {
        return $this->defaultKitchenID;
    }

    /**
     * Get languageCode
     *
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * Get autoOpenDefaultKitchen
     *
     * @return int
     */
    public function getAutoOpenDefaultKitchen()
    {
        return $this->autoOpenDefaultKitchen;
    }


    /**
     * Get moderator
     *
     * @return int
     */
    public function getModerator()
    {
        return $this->moderator;
    }

    /**
     * Set userID
     *
     * @param int $userID
     *
     * @return User
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * Set languageCode
     *
     * @param string $languageCode
     *
     * @return User
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * Set defaultKitchenID
     *
     * @param int $defaultKitchenID
     *
     * @return User
     */
    public function setDefaultKitchenID($defaultKitchenID)
    {
        $this->defaultKitchenID = $defaultKitchenID;

        return $this;
    }

    /**
     * Set autoOpenDefaultKitchen
     *
     * @param int $autoOpenDefaultKitchen
     *
     * @return User
     */
    public function setAutoOpenDefaultKitchen($autoOpenDefaultKitchen)
    {
        $this->autoOpenDefaultKitchen = $autoOpenDefaultKitchen;

        return $this;
    }


    /**
     * Set moderator
     *
     * @param int $moderator
     *
     * @return User
     */
    public function setModerator($moderator)
    {
        $this->moderator = $moderator;

        return $this;
    }



}