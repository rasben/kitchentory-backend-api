<?php
namespace AppBundle\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AmountRestController extends Controller {

  public function getAmountsAction(){
    $amounts = $this->getDoctrine()->getRepository('AppBundle:Amount')->findAll();
    if(empty($amounts)){
      throw $this->createNotFoundException();
    }
    return $amounts;
  }

  public function getAmountsTypesAction(){
    $amountsTypes = $this->getDoctrine()->getRepository('AppBundle:AmountType')->findAll();
    if(empty($amountsTypes)){
      throw $this->createNotFoundException();
    }
    return $amountsTypes;
  }
}
