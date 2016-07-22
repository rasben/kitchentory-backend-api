<?php
namespace AppBundle\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class KitchenRestController extends Controller {

  public function getKitchensAction(){
    $user = $this->getUser();

    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery(
      'SELECT K
      FROM AppBundle:Kitchen K
      INNER JOIN AppBundle:KitchenUser KU WITH KU.kitchenID=K.id
      WHERE KU.userID=:userID'
    )->setParameters(['userID' => $user->getId()]);
    $kitchens = $query->getResult();

    if(empty($kitchens)){
      throw $this->createNotFoundException();
    }
    return $kitchens;
  }

  public function getKitchenAction($kitchenid){
    $user = $this->getUser();

    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery(
      'SELECT K
      FROM AppBundle:Kitchen K
      INNER JOIN AppBundle:KitchenUser KU WITH KU.kitchenID=:kitchenID
      WHERE KU.userID=:userID AND K.id=:kitchenID'
    )->setParameters(['userID' => $user->getId(), 'kitchenID' => $kitchenid]);
    $kitchens = $query->getResult();


    if(empty($kitchens)){
      throw $this->createNotFoundException();
    }
    return $kitchens;
  }

  public function getKitchenUsersAction($kitchenid){
    $em = $this->getDoctrine()->getManager();
    $user = $this->getUser();

    $userHelper = $this->get('app.user_helper', $em);
    if (!$userHelper->canAccessKitchen($user->getId(), $kitchenid)) {
      throw $this->createNotFoundException();
    }

    $query = $em->createQuery('
      SELECT U.id, U.username, U.fullName
      FROM AppBundle:KitchenUser KU
      LEFT JOIN AppBundle:User U WITH (U.id = KU.userID)
      WHERE KU.kitchenID = :kitchenID
    ')->setParameters(['kitchenID' => $kitchenid]);

    $users = $query->getResult();

    if(empty($users)){
      throw $this->createNotFoundException();
    }

    return $users;
  }

  public function getKitchenIngredientsAction($kitchenid){
    $em = $this->getDoctrine()->getManager();
    $user = $this->getUser();

    $userHelper = $this->get('app.user_helper', $em);
    $language = $userHelper->getLanguage($user->getId());


    $query = $em->createQuery('
      SELECT I, INa.name, INa.master
      FROM AppBundle:KitchenIngredient KI
      LEFT JOIN AppBundle:IngredientName INa with (INa.languageCode=:languageCode AND INa.ingredientID = KI.ingredientID)
      LEFT JOIN AppBundle:Ingredient I with (I.id = KI.ingredientID)
      WHERE KI.kitchenID = :kitchenID
    ')->setParameters(['kitchenID' => $kitchenid, 'languageCode' => $language->getCode()]);

    $ingredients = $query->getResult();

    return $ingredients;
  }
}