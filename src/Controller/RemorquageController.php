<?php

namespace App\Controller;

use App\Entity\Remorquage;
use App\Form\RemorquageType;
use App\Repository\RemorquageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/remorquage")
 */
class RemorquageController extends AbstractController
{
    /**
     * @Route("/", name="app_remorquage_index", methods={"GET"})
     */
    public function index(RemorquageRepository $remorquageRepository): Response
    {
        return $this->render('remorquage/index.html.twig', [
            'remorquages' => $remorquageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_remorquage_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RemorquageRepository $remorquageRepository): Response
    {
        $remorquage = new Remorquage();
        $form = $this->createForm(RemorquageType::class, $remorquage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remorquageRepository->add($remorquage, true);

            return $this->redirectToRoute('app_remorquage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remorquage/new.html.twig', [
            'remorquage' => $remorquage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_remorquage_show", methods={"GET"})
     */
    public function show(Remorquage $remorquage): Response
    {
        return $this->render('remorquage/show.html.twig', [
            'remorquage' => $remorquage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_remorquage_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Remorquage $remorquage, RemorquageRepository $remorquageRepository): Response
    {
        $form = $this->createForm(RemorquageType::class, $remorquage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remorquageRepository->add($remorquage, true);

            return $this->redirectToRoute('app_remorquage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remorquage/edit.html.twig', [
            'remorquage' => $remorquage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_remorquage_delete", methods={"POST"})
     */
    public function delete(Request $request, Remorquage $remorquage, RemorquageRepository $remorquageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$remorquage->getId(), $request->request->get('_token'))) {
            $remorquageRepository->remove($remorquage, true);
        }

        return $this->redirectToRoute('app_remorquage_index', [], Response::HTTP_SEE_OTHER);
    }
}
