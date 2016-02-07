<?php
namespace AppBundle\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserRestController extends Controller {

  public function getUsersAction(){
    $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

    if(empty($users)){
      throw $this->createNotFoundException();
    }
    return $users;
  }


  public function getUserAction($userid){
    $users = $this->getDoctrine()->getRepository('AppBundle:User')->findByUserID($userid);

    if(empty($users)){
      throw $this->createNotFoundException();
    }
    return $users;
  }

  public function getUsersKitchensAction($userid){
    $em = $this->getDoctrine()->getManager();
    $query = $em->createQuery(
      'SELECT KU.role, K
      FROM AppBundle:KitchenUser KU
      INNER JOIN AppBundle:Kitchen K WITH KU.kitchenID=K.id
      WHERE KU.userID = :userid'
    )->setParameters(['userid' => $userid]);

    $kitchens = $query->getResult();

    if(empty($kitchens)){
      throw $this->createNotFoundException();
    }
    return $kitchens;
  }
}