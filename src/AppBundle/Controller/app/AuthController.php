<?php

namespace AppBundle\Controller\app;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthController extends Controller
{
    /**
     * @Route("/login", name="app_login")
     */
    public function loginAction()
    {
        $authUtils = $this->get('security.authentication_utils');

        return $this->render('auth/login.html.twig', array(
            'last_username' => $authUtils->getLastUsername(),
            'error' => $authUtils->getLastAuthenticationError(),
        ));
    }

    /**
     * @Route("/login_check", name="app_login_check")
     */
    public function loginCheckAction()
    {
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logoutAction()
    {
    }
}
