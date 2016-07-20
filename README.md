kitchentory
===========






## Adding Mock DB data:
$ php app/console doctrine:schema:drop --force (optional)
$ php app/console doctrine:schema:update --force
$ php app/console doctrine:fixtures:load