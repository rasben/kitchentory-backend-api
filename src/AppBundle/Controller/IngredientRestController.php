<?php
namespace AppBundle\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class IngredientRestController extends Controller {

  public function getIngredientsAction(){
    $ingredients = $this->getDoctrine()->getRepository('AppBundle:Ingredient')->findAll();

    if(empty($ingredients)){
      throw $this->createNotFoundException();
    }
    return $ingredients;
  }

  public function getIngredientAction($ingredientIdentifier){

    $em = $this->getDoctrine()->getManager();

    $query = $em->createQuery(
      'SELECT IGN.name
      FROM AppBundle:IngredientName IGN
      WHERE IGN.ingredientID=:ingID
      ORDER BY IGN.master DESC'
    )->setParameters(['ingID' => $ingredientIdentifier]);
    $ingredientsNames = $query->getResult();

    $query = $em->createQuery(
      'SELECT I
      FROM AppBundle:IngredientName IGN
      INNER JOIN AppBundle:Ingredient I WITH IGN.ingredientID=I.id
      WHERE IGN.ingredientID=:ingID'
    )->setParameters(['ingID' => $ingredientIdentifier]);
    $ingredients = $query->getResult();

    $ingredients = array_merge($ingredients, ['ingredientNames' => $ingredientsNames]);

    if(empty($ingredients)){
      throw $this->createNotFoundException();
    }

    return $ingredients;
  }
}