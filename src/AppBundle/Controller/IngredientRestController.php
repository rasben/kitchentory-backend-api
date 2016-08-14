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
    $user = $this->getUser();

    $userHelper = $this->get('app.user_helper', $em);
    $language = $userHelper->getLanguage($user->getId());

    // Looking with an ID
    if (is_numeric($ingredientIdentifier)) {
      $query = $em->createQuery(
        'SELECT IGN.name
        FROM AppBundle:IngredientName IGN
        WHERE IGN.ingredientID=:ingID AND IGN.languageCode=:languageCode
        ORDER BY IGN.master DESC'
      )->setParameters(['ingID' => $ingredientIdentifier, 'languageCode' => $language->getCode()]);
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
        'SELECT IDENTITY(IGN.ingredientID)
        FROM AppBundle:IngredientName IGN
        WHERE IGN.name=:ingName AND IGN.languageCode = :languageCode
        ORDER BY IGN.master DESC'
      )->setParameters(['ingName' => $ingredientIdentifier, 'languageCode' => $language->getCode()]);
      $ingredientID = $query->getResult();

      if(empty($ingredientID)){
        throw $this->createNotFoundException();
      }

      $ingredientID = $ingredientID[0][1];

      $query = $em->createQuery(
        'SELECT IGN.name
        FROM AppBundle:IngredientName IGN
        WHERE IGN.ingredientID=:ingID AND IGN.languageCode = :languageCode
        ORDER BY IGN.master DESC'
      )->setParameters(['ingID' => $ingredientID, 'languageCode' => $language->getCode()]);
      $ingredientsNames = $query->getResult();


      $query = $em->createQuery(
        'SELECT I
        FROM AppBundle:Ingredient I
        WHERE I.id=:ingID'
      )->setParameters(['ingID' => $ingredientID]);
      $ingredients = $query->getResult();
    }

    if(empty($ingredients)){
      throw $this->createNotFoundException();
    }


    $ingredients = array_merge($ingredients, ['ingredientNames' => $ingredientsNames]);

    return $ingredients;
  }
}