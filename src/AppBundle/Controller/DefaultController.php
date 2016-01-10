<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Amount;
use AppBundle\Entity\Category;
use AppBundle\Entity\Ingredient;
use AppBundle\Entity\IngredientAlias;
use AppBundle\Entity\Recipe;
use AppBundle\Entity\RecipeAmount;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/example/create", name="examplecreate")
     */
    public function createAction() {
        $amount = new Amount();
        $amount->setName('liter');

        $amount2 = new Amount();
        $amount2->setName('kg');

        $category = new Category();
        $category->setName('spices');

        $category2 = new Category();
        $category2->setName('liquids');

        $ingredient = new Ingredient();
        $ingredient->setName('milk');
        $ingredient->setAmount(2);
        $ingredient->setCategoryID($category);
        $ingredient->setAmountID($amount2);


        $em = $this->getDoctrine()->getManager();
        $em->persist($amount);
        $em->persist($amount2);
        $em->persist($category);
        $em->persist($category2);
        $em->persist($ingredient);
        $em->flush();
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }


}

