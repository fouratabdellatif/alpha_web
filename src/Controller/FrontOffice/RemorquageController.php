<?php

namespace App\Controller\FrontOffice;

use App\Entity\Remorquage;
use App\Form\RemorquageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemorquageController extends AbstractController
{
    /**
     * @Route("/remorquages", name="front_office_remorquage_index")
     */
    public function indexfront(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/remorquages/new", name="front_office_remorquage_new", methods={"GET", "POST"})
     */
    public function new(Request $request): Response
    {
        $remorquage = new Remorquage();
        $form = $this->createForm(RemorquageType::class, $remorquage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($remorquage);
            $entityManager->flush();

            return $this->redirectToRoute('front_office_remorquage_new');
        }

        return $this->render('front/remorquage/get-remorquage.html.twig', [
            'remorquage' => $remorquage,
            'form' => $form->createView(),
        ]);
    }
}
