<?php

namespace AppBundle\Controller;

use AppBundle\Form\GameType;
use AppBundle\Form\ResultType;
use AppBundle\Form\RoleType;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/form")
 */
class FormController extends Controller
{
    /**
     * @Route("/role", name="form_role")
     */
    public function roleAction(Request $request)
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

    /**
     * @Route("/game", name="form_game")
     */
    public function gameAction(Request $request)
    {
        $form = $this->createForm(GameType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $game = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user", name="form_user")
     */
    public function userAction(Request $request)
    {
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/result", name="form_result")
     */
    public function resultAction(Request $request)
    {
        $form = $this->createForm(ResultType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $result = $form->getData();
            $result->setCreateAt(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($result);
            $em->flush();
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
