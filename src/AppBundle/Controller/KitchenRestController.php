<?php
namespace AppBundle\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class KitchenRestController extends Controller {

  public function getKitchensAction(){
    $kitchens = $this->getDoctrine()->getRepository('AppBundle:Kitchen')->findAll();
    if(empty($kitchens)){
      throw $this->createNotFoundException();
    }
    return $kitchens;
  }

  public function getKitchenAction($kitchenid){
    $kitchens = $this->getDoctrine()->getRepository('AppBundle:Kitchen')->findOneById($kitchenid);

    if(empty($kitchens)){
      throw $this->createNotFoundException();
    }
    return $kitchens;
  }

  public function getKitchenUsersAction($kitchenid){
    $users = $this->getDoctrine()->getRepository('AppBundle:KitchenUser')->findByKitchenID($kitchenid);

    if(empty($users)){
      throw $this->createNotFoundException();
    }
    return $users;
  }

  public function getKitchenIngredientsAction($kitchenid){
    $ingredients = $this->getDoctrine()->getRepository('AppBundle:KitchenIngredient')->findByKitchenID($kitchenid);

    if(empty($ingredients)){
      throw $this->createNotFoundException();
    }
    return $ingredients;
  }
}