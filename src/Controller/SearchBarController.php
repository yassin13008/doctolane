<?php

namespace App\Controller;

use App\Entity\Professionnals;
use App\Form\SearchBarFormType;
use App\Repository\ProfessionnalsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchBarController extends AbstractController
{
    /**
     * @Route("/SearchBar/search", name="SearchBar_search")
     */
    public function search(Request $request, ProfessionnalsRepository $professionnalsRepository): Response
    {
        $form = $this->createForm(SearchBarFormType::class);
        $form->handleRequest($request);

        $query = $form->get('search')->getData();

        $repository = $this->getDoctrine()->getRepository(Professionnals::class);
        $results = $professionnalsRepository->findByLastName($query);

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'results' => $results,
        ]);
    }
}