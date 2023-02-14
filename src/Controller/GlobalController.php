<?php

namespace App\Controller;

use App\Entity\Remorquage;
use App\Form\RemorquageType;
use App\Repository\RemorquageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GlobalController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }

    /**
     * @Route("/admin/404", name="notfound")
     */
    public function notfound(): Response
    {
        return $this->render('admin/404.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/blank", name="blank")
     */
    public function blank(): Response
    {
        return $this->render('admin/blank.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/buttons", name="buttons")
     */
    public function buttons(): Response
    {
        return $this->render('admin/buttons.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/cards", name="cards")
     */
    public function cards(): Response
    {
        return $this->render('admin/cards.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/charts", name="charts")
     */
    public function charts(): Response
    {
        return $this->render('admin/charts.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/forgot-password", name="forgot_password")
     */
    public function forgotPassword(): Response
    {
        return $this->render('admin/forgot-password.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('admin/login.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/register", name="register")
     */
    public function register(): Response
    {
        return $this->render('admin/register.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/tables", name="tables")
     */
    public function tables(): Response
    {
        return $this->render('admin/tables.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/utilities-animation", name="utilities_animation")
     */
    public function utilsAnim(): Response
    {
        return $this->render('admin/utilities-animation.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/utilities-border", name="utilities_border")
     */
    public function utilsBorder(): Response
    {
        return $this->render('admin/utilities-border.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/utilities-color", name="utilities_color")
     */
    public function utilsColor(): Response
    {
        return $this->render('admin/utilities-color.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
    
    /**
     * @Route("/admin/utilities-other", name="utilities_other")
     */
    public function utilsOther(): Response
    {
        return $this->render('admin/utilities-other.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }

    /**
     * @Route("/", name="front")
     */
    public function indexfront(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('front/about.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/services", name="services")
     */
    public function services(): Response
    {
        return $this->render('front/services.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/service-details", name="service_details")
     */
    public function servicesDetails(): Response
    {
        return $this->render('front/service-details.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/get-a-quote", name="get_a_quote")
     */
    public function getAQuote(): Response
    {
        return $this->render('front/get-a-quote.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/demander-remorquage", name="app_remorquage_new_front", methods={"GET", "POST"})
     */
    public function demanderRemorquage(Request $request, RemorquageRepository $remorquageRepository): Response
    {
        $remorquage = new Remorquage();
        $form = $this->createForm(RemorquageType::class, $remorquage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remorquageRepository->add($remorquage, true);

            return $this->redirectToRoute('front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front/get-remorquage.html.twig', [
            'remorquage' => $remorquage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/pricing", name="pricing")
     */
    public function pricing(): Response
    {
        return $this->render('front/pricing.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

}
