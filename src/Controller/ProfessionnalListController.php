<?php

namespace App\Controller;

use App\Entity\Professionnals;
use App\Repository\AppointmentRepository;
use App\Repository\ProfessionnalsRepository;
use App\Repository\SpecialitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionnalListController extends AbstractController
{
    #[Route('/professionnal/list', name: 'app_professionnal_list_')]
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

    #[Route('/professionnal/list/show/{id}', name: 'show')]
    public function show($id,ProfessionnalsRepository $proRepo, SpecialitiesRepository $speRepo, AppointmentRepository $appRepo,Request $request): Response{

        $professionnal = $proRepo->find($id);


        $speciality= $speRepo->find($professionnal);
        $speLabelPro = $speciality->getSpecialityLabel();

        $page = $request->query->getInt('page', 1);

        $appointments = $appRepo->paginateAppByPro($page, $id);







        return $this->render('professionnal_list/show.html.twig', [
            'controller_name' => 'ProfessionnalListController',
            'professionnal' => $professionnal,
            'speciality' => $speLabelPro,
            'appointments' => $appointments
        ]);
    }
}
