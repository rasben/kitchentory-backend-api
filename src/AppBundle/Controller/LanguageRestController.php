<?php
namespace AppBundle\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class LanguageRestController extends Controller {

  public function getLanguagesAction(){
    $languages = $this->getDoctrine()->getRepository('AppBundle:Language')->findAll();

    if(empty($languages)){
      throw $this->createNotFoundException();
    }
    return $languages;
  }
}