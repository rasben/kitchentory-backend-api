<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use AppBundle\Entity\UserSetting;
use AppBundle\Entity\Category;
use AppBundle\Entity\Amount;
use AppBundle\Entity\Ingredient;
use AppBundle\Entity\IngredientName;
use AppBundle\Entity\Language;
use AppBundle\Entity\Kitchen;
use AppBundle\Entity\KitchenUser;
use AppBundle\Entity\KitchenIngredient;
use AppBundle\Entity\Role;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	// Users
        $userNew = new User();
        $userNew->setName('rasben');
        $userNew->setPassword('rasben2');
        $userNew->setFullName('Benjamin Rasmussen');

        $manager->persist($userNew);
        $manager->flush();

        $userNew = new User();
        $userNew->setName('elvis');
        $userNew->setPassword('elvis2');
        $userNew->setFullName('Elvis Presley');

        $manager->persist($userNew);
        $manager->flush();

        $userNew = new User();
        $userNew->setName('sherlock');
        $userNew->setPassword('sherlock2');
        $userNew->setFullName('Sherlock Holmes');

        $manager->persist($userNew);
        $manager->flush();

        $userNew = new User();
        $userNew->setName('alexander');
        $userNew->setPassword('alexander2');
        $userNew->setFullName('Alexander The Great');

        $manager->persist($userNew);
        $manager->flush();

        // Kitchens
        $kitchenNew = new Kitchen();
        $kitchenNew->setName('The Copenhagen Kitchen');
        $kitchenNew->setLocation('Copenhagen, DK');

        $manager->persist($kitchenNew);
        $manager->flush();

        $kitchenNew = new Kitchen();
        $kitchenNew->setName('The London Kitchen');
        $kitchenNew->setLocation('London, UK');

        $manager->persist($kitchenNew);
        $manager->flush();

        $kitchenNew = new Kitchen();
        $kitchenNew->setName('The Berlin Kitchen');
        $kitchenNew->setLocation('Berlin, DE');

        $manager->persist($kitchenNew);
        $manager->flush();


        // User Settings
        $userSettingNew = new UserSetting();
        $userSettingNew->setUserID($manager->getReference('AppBundle:User', 1));
        $userSettingNew->setDefaultKitchenID($manager->getReference('AppBundle:Kitchen', 1));
        $userSettingNew->setAutoOpenDefaultKitchen(2);
        $userSettingNew->setModerator(2);

        $manager->persist($userSettingNew);
        $manager->flush();

        $userSettingNew = new UserSetting();
        $userSettingNew->setUserID($manager->getReference('AppBundle:User', 2));
        $userSettingNew->setDefaultKitchenID($manager->getReference('AppBundle:Kitchen', 2));
        $userSettingNew->setAutoOpenDefaultKitchen(1);
        $userSettingNew->setModerator(1);

        $manager->persist($userSettingNew);
        $manager->flush();

        $userSettingNew = new UserSetting();
        $userSettingNew->setUserID($manager->getReference('AppBundle:User', 3));
        $userSettingNew->setDefaultKitchenID($manager->getReference('AppBundle:Kitchen', 2));
        $userSettingNew->setAutoOpenDefaultKitchen(2);
        $userSettingNew->setModerator(1);

        $manager->persist($userSettingNew);
        $manager->flush();


        $userSettingNew = new UserSetting();
        $userSettingNew->setUserID($manager->getReference('AppBundle:User', 4));
        $userSettingNew->setDefaultKitchenID($manager->getReference('AppBundle:Kitchen', 2));
        $userSettingNew->setAutoOpenDefaultKitchen(4);
        $userSettingNew->setModerator(2);

        $manager->persist($userSettingNew);
        $manager->flush();


        // Roles
        $roleNew = new Role();
        $roleNew->setTitle('owner');

        $manager->persist($roleNew);
        $manager->flush();

        $roleNew = new Role();
        $roleNew->setTitle('editor');

        $manager->persist($roleNew);
        $manager->flush();

        $roleNew = new Role();
        $roleNew->setTitle('reader');

        $manager->persist($roleNew);
        $manager->flush();

        // Categories
        $categoryNew = new Category();
        $categoryNew->setName('vegtables');

        $manager->persist($categoryNew);
        $manager->flush();

        $categoryNew = new Category();
        $categoryNew->setName('meats');

        $manager->persist($categoryNew);
        $manager->flush();

        $categoryNew = new Category();
        $categoryNew->setName('spices');

        $manager->persist($categoryNew);
        $manager->flush();

        $categoryNew = new Category();
        $categoryNew->setName('poultry');

        $manager->persist($categoryNew);
        $manager->flush();

        $categoryNew = new Category();
        $categoryNew->setName('bakery');

        $manager->persist($categoryNew);
        $manager->flush();

        // Languages
        $languageNew = new Language();
        $languageNew->setCode('en');

        $manager->persist($languageNew);
        $manager->flush();

        $languageNew = new Language();
        $languageNew->setCode('da');

        $manager->persist($languageNew);
        $manager->flush();

        $languageNew = new Language();
        $languageNew->setCode('fr');

        $manager->persist($languageNew);
        $manager->flush();

        // Kitchen Users
        $kitchenUserNew = new kitchenUser();
        $kitchenUserNew->setUserID($manager->getReference('AppBundle:User', 1));
        $kitchenUserNew->setRoleID($manager->getReference('AppBundle:Role', 1));
        $kitchenUserNew->setKitchenID($manager->getReference('AppBundle:Kitchen', 1));

        $manager->persist($kitchenUserNew);
        $manager->flush();

        $kitchenUserNew = new kitchenUser();
        $kitchenUserNew->setUserID($manager->getReference('AppBundle:User', 1));
        $kitchenUserNew->setRoleID($manager->getReference('AppBundle:Role', 2));
        $kitchenUserNew->setKitchenID($manager->getReference('AppBundle:Kitchen', 2));

        $manager->persist($kitchenUserNew);
        $manager->flush();

        $kitchenUserNew = new kitchenUser();
        $kitchenUserNew->setUserID($manager->getReference('AppBundle:User', 2));
        $kitchenUserNew->setRoleID($manager->getReference('AppBundle:Role', 1));
        $kitchenUserNew->setKitchenID($manager->getReference('AppBundle:Kitchen', 2));

        $manager->persist($kitchenUserNew);
        $manager->flush();

        $kitchenUserNew = new kitchenUser();
        $kitchenUserNew->setUserID($manager->getReference('AppBundle:User', 3));
        $kitchenUserNew->setRoleID($manager->getReference('AppBundle:Role', 2));
        $kitchenUserNew->setKitchenID($manager->getReference('AppBundle:Kitchen', 2));

        $manager->persist($kitchenUserNew);
        $manager->flush();

        // Amounts
        $amountNew = new Amount();
        $amountNew->setName('Kilogram');
        $amountNew->setShortName('kg');

        $manager->persist($amountNew);
        $manager->flush();

        $amountNew = new Amount();
        $amountNew->setName('Gram');
        $amountNew->setShortName('g');

        $manager->persist($amountNew);
        $manager->flush();

        $amountNew = new Amount();
        $amountNew->setName('Liter');
        $amountNew->setShortName('l');

        $manager->persist($amountNew);
        $manager->flush();

        $amountNew = new Amount();
        $amountNew->setName('Mililiter');
        $amountNew->setShortName('ml');

        $manager->persist($amountNew);
        $manager->flush();

        $amountNew = new Amount();
        $amountNew->setName('Teaspoon');
        $amountNew->setShortName('ts');

        $manager->persist($amountNew);
        $manager->flush();


        $amountNew = new Amount();
        $amountNew->setName('Table spoon');
        $amountNew->setShortName('tbls');

        $manager->persist($amountNew);
        $manager->flush();

        // Ingredients & names
        $ingredientNew = new Ingredient();
        $ingredientNew->setGlobal(2);
        $ingredientNew->setCategoryID($manager->getReference('AppBundle:Category', 4));
        $ingredientNew->setAmountID($manager->getReference('AppBundle:Amount', 2));

        $manager->persist($ingredientNew);
        $manager->flush();

        $ingredientNew = new IngredientName();
        $ingredientNew->setName('Toast');
        $ingredientNew->setIngredientID($manager->getReference('AppBundle:Ingredient', 1));
        $ingredientNew->setLanguageID($manager->getReference('AppBundle:Language', 1));
        $ingredientNew->setMaster(1);

        $manager->persist($ingredientNew);
        $manager->flush();

        $ingredientNew = new Ingredient();
        $ingredientNew->setGlobal(2);
        $ingredientNew->setCategoryID($manager->getReference('AppBundle:Category', 2));
        $ingredientNew->setAmountID($manager->getReference('AppBundle:Amount', 2));

        $manager->persist($ingredientNew);
        $manager->flush();

        $ingredientNew = new IngredientName();
        $ingredientNew->setName('Veal');
        $ingredientNew->setIngredientID($manager->getReference('AppBundle:Ingredient', 2));
        $ingredientNew->setLanguageID($manager->getReference('AppBundle:Language', 1));
        $ingredientNew->setMaster(0);

        $manager->persist($ingredientNew);
        $manager->flush();

        $ingredientNew = new Ingredient();
        $ingredientNew->setGlobal(2);
        $ingredientNew->setCategoryID($manager->getReference('AppBundle:Category', 3));
        $ingredientNew->setAmountID($manager->getReference('AppBundle:Amount', 2));

        $manager->persist($ingredientNew);
        $manager->flush();

        $ingredientNew = new IngredientName();
        $ingredientNew->setName('Chicken Wings');
        $ingredientNew->setIngredientID($manager->getReference('AppBundle:Ingredient', 3));
        $ingredientNew->setLanguageID($manager->getReference('AppBundle:Language', 1));
        $ingredientNew->setMaster(1);

        $manager->persist($ingredientNew);
        $manager->flush();


    }
}