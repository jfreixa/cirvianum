<?php

namespace AppBundle\Controller;

use AppBundle\Form\RoleType;
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
        $form = $this->createForm(RoleType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $role = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
