<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Search controller.
 *
 */
class SearchController extends Controller {
    
    public function IndexAction() {
        
        return $this->render('search/index.html.twig', []);
    }
}
