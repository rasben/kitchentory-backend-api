<?php

namespace AppBundle\Security;

use Doctrine\ORM\EntityManager;

class UserHelper {

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function availableKitchens($userID) {
        /*
         * Returns an array of IDs of kitchens that the user has access to.
         */

        $query = $this->em->createQuery(
          'SELECT K.id
          FROM AppBundle:Kitchen K
          INNER JOIN AppBundle:KitchenUser KU WITH KU.kitchenID=K.id
          WHERE KU.userID=:userID'
        )->setParameters(['userID' => $userID]);
        $kitchens = $query->getResult();
        require_once('krumo/class.krumo.php'); krumo($kitchens); exit;

        return $kitchens;
    }

    public function canAccessKitchen($userID, $kitchenID) {
        /*
         * Returns bool.
         * Checks if $userID has access to kitchen with $kitchenID
         */

        $query = $this->em->createQuery(
          'SELECT KU.id
          FROM AppBundle:KitchenUser KU
          WHERE KU.userID=:userID AND  KU.kitchenID=:kitchenID'
        )->setParameters(['userID' => $userID, 'kitchenID' => $kitchenID]);
        $kitchenUserMatch = $query->getResult();

        if(empty($kitchenUserMatch)){
            return false;
        }

        return true;
    }

}