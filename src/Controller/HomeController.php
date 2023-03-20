<?php

namespace App\Controller;

use App\Form\SearchBarFormType;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class HomeController extends AbstractController
{
    // Ceci est la route de la page d'acceuille
    #[Route('/', name: 'home')]
    public function index(ProfessionnalsRepository $professionnalsRepository, HttpFoundationRequest $request): Response
    {
        $form = $this->createForm(SearchBarFormType::class);
        $form->handleRequest($request);

        $query = $form->get('search')->getData();

        $results = $professionnalsRepository->findByLastname($query);
    
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'results' => $results,
        ]);
    }
}
