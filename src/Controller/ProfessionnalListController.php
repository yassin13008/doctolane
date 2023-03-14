<?php

namespace App\Controller;

use App\Entity\Professionnals;
use App\Repository\ProfessionnalsRepository;
use App\Repository\SpecialitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionnalListController extends AbstractController
{
    #[Route('/professionnal/list', name: 'app_professionnal_list')]
    public function index(ProfessionnalsRepository $professionnalsRepo, SpecialitiesRepository $specialitiesRepo): Response
    {

    $professionnals = $professionnalsRepo->findAll();


    for ($i=0; $i < sizeof($professionnals) ; $i++) { 
        
        $proSpeciality[] = $specialitiesRepo->find($professionnals[$i]->getSpeciality());

        $proSpecialityLabel = $proSpeciality[$i]->getSpecialityLabel();
    }
    


        return $this->render('professionnal_list/index.html.twig', [
            'controller_name' => 'ProfessionnalListController',
            'professionnals' => $professionnals,
            'specialities' => $proSpecialityLabel
        ]);
    }
}
