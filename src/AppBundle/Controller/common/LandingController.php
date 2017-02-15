<?php

namespace AppBundle\Controller\common;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LandingController extends Controller
{
    /**
     * @Route("/", name="landing")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneBy(['name' => 'user1']);
        dump($user->getRoles());
        die;
        return $this->render('common/index.html.twig', array());
    }
}
