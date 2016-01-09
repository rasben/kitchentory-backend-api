<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class InventoryController {

    /**
     * @Route("/inventory/items")
     */
    public function getInventoryItems() {
        return new Response(
            '<html><body>This is a huge list of a kitchens inventory</body></html>'
        );
    }

    /**
     * @Route("/inventory/item/{slug}")
     */
    public function getInventoryItem($slug) {
        return new Response(
            '<html><body>This is info about a single item:' . $slug . '</body></html>'
        );
    }
}
