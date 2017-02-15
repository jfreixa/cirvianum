<?php

namespace AppBundle\Controller\app;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/game")
 */

class GameController extends Controller
{
    /**
     * @Route("/", name="games_list")
     */
    public function indexAction()
    {
        return $this->render('common/index.html.twig', array());
    }
}
