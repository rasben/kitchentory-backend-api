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
     * @var string
     *
     * @ORM\Column(name="auto_open_default_kitchen", type="boolean", nullable=false, options={"default":1})
     */
    private $autoOpenDefaultKitchen;

    /**
     * @var string
     *
     * @ORM\Column(name="moderator", type="boolean", nullable=false, options={"default":0})
     */
    private $moderator;

    /**
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_code", referencedColumnName="code", nullable=false)
     */
    private $languageCode;

}