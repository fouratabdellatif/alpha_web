<?php

namespace App\Controller\BackOffice;

use App\Entity\Remorquage;
use App\Form\RemorquageType;
use App\Repository\RemorquageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/remorquages")
 */
class RemorquageController extends AbstractController
{
    /**
     * @Route("/", name="back_office_remorquage_index", methods={"GET"})
     */
    public function index(RemorquageRepository $remorquageRepository): Response
    {
        $remorquages = $remorquageRepository->findAll();

        return $this->render('back_office/remorquage/index.html.twig', [
            'remorquages' => $remorquages,
        ]);
    }

    /**
     * @Route("/new", name="back_office_remorquage_new", methods={"GET","POST"})
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

            return $this->redirectToRoute('back_office_remorquage_index');
        }

        return $this->render('back_office/remorquage/new.html.twig', [
            'remorquage' => $remorquage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="back_office_remorquage_show", methods={"GET"})
     */
    public function show(Remorquage $remorquage): Response
    {
        return $this->render('back_office/remorquage/show.html.twig', [
            'remorquage' => $remorquage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="back_office_remorquage_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Remorquage $remorquage): Response
    {
        $form = $this->createForm(RemorquageType::class, $remorquage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('back_office_remorquage_index');
        }

        return $this->render('back_office/remorquage/edit.html.twig', [
            'remorquage' => $remorquage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="back_office_remorquage_delete", methods={"POST"})
     */
    public function delete(Request $request, Remorquage $remorquage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$remorquage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($remorquage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('back_office_remorquage_index');
    }
}
