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

    // Looking with an ID
    if (is_numeric($ingredientIdentifier)) {
      $query = $em->createQuery(
        'SELECT IGN.name, L
        FROM AppBundle:IngredientName IGN
        INNER JOIN AppBundle:Language L WITH IGN.languageID=L.id
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
    }
    // Looking with a name
    else {
      $query = $em->createQuery(
        'SELECT IGN.name, L
        FROM AppBundle:IngredientName IGN
        INNER JOIN AppBundle:Language L WITH IGN.languageID=L.id
        WHERE IGN.name=:ingName
        ORDER BY IGN.master DESC'
      )->setParameters(['ingName' => $ingredientIdentifier]);
      $ingredientsNames = $query->getResult();

      $query = $em->createQuery(
        'SELECT I
        FROM AppBundle:IngredientName IGN
        INNER JOIN AppBundle:Ingredient I WITH IGN.ingredientID=I.id
        WHERE IGN.name=:ingName'
      )->setParameters(['ingName' => $ingredientIdentifier]);
      $ingredients = $query->getResult();
    }

    // Putting language info in a more descriptive field.
    foreach($ingredientsNames as &$ingredientsName){
      if (isset($ingredientsName[0])) {
        $ingredientsName['language'] = $ingredientsName[0];
        unset($ingredientsName[0]);
      }
    }

    $ingredients = array_merge($ingredients, ['ingredientNames' => $ingredientsNames]);

    if(empty($ingredients) || empty($ingredientsNames)){
      throw $this->createNotFoundException();
    }

    return $ingredients;
  }
}