<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use DateTimeZone;
use App\Entity\Aviability;
use App\Entity\Appointment;
use App\Form\AviabilityType;
use App\Repository\AppointmentRepository;
use App\Repository\AviabilityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AviabilityController extends AbstractController
{
    #[Route('/aviability', name: 'aviability')]
    public function index(AviabilityRepository $aviaRepo): Response
    {
        $aviaPro = $aviaRepo->find($this->getUser());
    

        return $this->render('aviability/index.html.twig', [
            'controller_name' => 'AviabilityController',
            'aviability' => $aviaPro
        ]);
    }

    #[Route('/aviability/edit/', name: 'aviabilityEdit')]
    public function add(AviabilityRepository $aviaRepo, Request $request, AppointmentRepository $appRepo, EntityManagerInterface $manager):Response
    {


        $aviaPro = $aviaRepo->find($this->getUser());
        $appProAll = $appRepo->findByProfessionalId($this->getUSer());

        $aviaOldStart = $aviaPro->getStartDate();
        $aviaOldEnd = $aviaPro->getEndDate();

        $form = $this->createForm(AviabilityType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $timeZone = new DateTimeZone('Europe/Paris');
            $today = new DateTime();

            $data = $form->getData();

            
            $newStartDate = $data->getStartDate()->setTimeZone($timeZone);
            $newEndDate = $data->getEndDate()->setTimeZone($timeZone);
            $newDurationDate = $data->getDurationDate();
            $newGapDate = $data->getGapDate();
            $newStartTime = $data->getStartTime();
            $newEndTime = $data->getEndTime();

            if($aviaOldEnd > $newStartDate){

                dump($newStartDate);
                dd("Votre créneau dois se situer après votre anciens fin de disponibilités ");
            }
            if($newStartDate < $today){
                dd('Votre début de disponibilité doit être dans le futur ');
            }
            for ($i=0; $i < count($appProAll) ; $i++) { 

                if($appProAll[$i]->getEnd() > $newStartDate){
                    dd('Un créneau est déjà pris, veuillez supprimez ce rendez vous ou mettez une date de début de disponibilité supérieur à ce ou ces créneaux');
                }
            }

            $aviaPro->setStartDate($newStartDate);
            $aviaPro->setEndDate($newEndDate);
            $aviaPro->setDurationDate($newDurationDate);
            $aviaPro->setGapDate($newGapDate);
            $aviaPro->setStartTime($newStartTime);
            $aviaPro->setEndTime($newEndTime);

            $aviaRepo->save($aviaPro, true);

            $startDispo = $newStartDate;
            $finDispo = $newEndDate;
            $startTime = $newStartTime;
            $endTime = $newEndTime;
            $dureeRdv = $newDurationDate;
            $delaiAttente = $newGapDate;

            $datesRdv = [];

// Boucle pour générer les rendez-vous
while ($startDispo <= $finDispo) {
    // Vérifier si l'heure actuelle est entre 10h et 18h
    $heureCourante = $startDispo->format('H:i:s');
    if ($heureCourante >= $startTime && $heureCourante <= $endTime) {
        // Ajouter la date de rendez-vous
        $datesRdv[] = $startDispo->format('Y-m-d H:i:s');

        // Ajouter la durée du rendez-vous
        $startDispo->add(new DateInterval('PT' . $dureeRdv . 'M'));

        // Ajouter le délai d'attente entre les rendez-vous
        $startDispo->add(new DateInterval('PT' . $delaiAttente . 'M'));
    } else {
        // Passer à la plage horaire suivante
        $startDispo->add(new DateInterval('PT1M'));
    }
}

        $appointments= [];

        for($i= 0; $i < count($datesRdv); $i++){

            $appointment = new Appointment();

            $appStart= \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);
            // if(array_key_exists($datesRdv[$i+1], $datesRdv)){

            //     $appEnd = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);

            //     $appEnd->add(new DateInterval('PT' . $dureeRdv . 'M'));
            // }
            $appEndBf = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);
            $appEnd = $appEndBf->add(new DateInterval('PT' . $dureeRdv . 'M'));
            

            $appointment->setStart($appStart);
            $appointment->setEnd($appEnd);


            $manager->persist($appointment);

        }



        $manager->flush();

        $this->addFlash('success','Vos disponibilités ont été enregistrées, allez voir la liste de vos rendez-vous, des créneaux ont été généré automatiquement, Vous pouvez modifier ou supprimer le rendez vous insérer ci besoin');
        return $this->redirectToRoute('aviability');

            
        }


        return $this->render('aviability/generate.html.twig', [
            'controller_name' => 'AviabilityController',
            'form' => $form->createView(),
            'aviability' => $aviaPro
        ]);
    }

                    // NOUVELLE DISPONIBILITES POUR LA PREMIERE FOIS APRES VOIR EDIT 
    #[Route('/aviability/new', name: 'aviabilityNew')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $timeZone = new DateTimeZone('Europe/Paris');

        $aviability = new Aviability();

        $doctor = $this->getUser();
        
        
        $form = $this->createForm(AviabilityType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $aviabilityForm = $form->getData();

            $debutDispo = $aviabilityForm->getStartDate()->setTimeZone($timeZone); // debut de disponibilité
            $finDispo = $aviabilityForm->getEndDate()->setTimeZone($timeZone); // fin de disponibilité

            $startTimeZ = $aviabilityForm->getStartTime()->setTimeZone($timeZone); // heure disponibl
            $endTimeZ = $aviabilityForm->getEndTime()->setTimeZone($timeZone);

            $startTime = $startTimeZ->format('H:i');
            $endTime = $endTimeZ->format('H:i');

            $dureeRdv = $aviabilityForm->getDurationDate();
            $delaiAttente = $aviabilityForm->getGapDate();

            $aviability->setStartDate($debutDispo);
            $aviability->setEndDate($finDispo);
            $aviability->setStartTime($startTimeZ);
            $aviability->setEndTime($endTimeZ);
            $aviability->setGapDate($delaiAttente);
            $aviability->setDurationDate($dureeRdv);
            $aviability->addAviabilityPro($doctor);

            $manager->persist($aviability);
            $manager->flush();


            $datesRdv = [];
            $startDispo = $debutDispo;

// Boucle pour générer les rendez-vous
while ($startDispo <= $finDispo) {
    // Vérifier si l'heure actuelle est entre 10h et 18h
    $heureCourante = $startDispo->format('H:i:s');
    if ($heureCourante >= $startTime && $heureCourante <= $endTime) {
        // Ajouter la date de rendez-vous
        $datesRdv[] = $startDispo->format('Y-m-d H:i:s');

        // Ajouter la durée du rendez-vous
        $startDispo->add(new DateInterval('PT' . $dureeRdv . 'M'));

        // Ajouter le délai d'attente entre les rendez-vous
        $startDispo->add(new DateInterval('PT' . $delaiAttente . 'M'));
    } else {
        // Passer à la plage horaire suivante
        $startDispo->add(new DateInterval('PT1M'));
    }
}

        $appointments= [];

        for($i= 0; $i < count($datesRdv); $i++){

            $appointment = new Appointment();

            $appStart= \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);
            // if(array_key_exists($datesRdv[$i+1], $datesRdv)){

            //     $appEnd = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);

            //     $appEnd->add(new DateInterval('PT' . $dureeRdv . 'M'));
            // }
            $appEndBf = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);
            $appEnd = $appEndBf->add(new DateInterval('PT' . $dureeRdv . 'M'));
            

            $appointment->setStart($appStart);
            $appointment->setEnd($appEnd);
            $appointment->addProfessionnal($doctor);

            $manager->persist($appointment);

        }

        $manager->flush();

        $this->addFlash('success','Vos disponibilités ont été enregistrées, allez voir la liste de vos rendez-vous, des créneaux ont été généré automatiquement, Vous pouvez modifier ou supprimer le rendez vous insérer ci besoin');
        return $this->redirectToRoute('aviability');

        }

        return $this->render('aviability/new.html.twig', [
            'controller_name' => 'AviabilityController',
            'form' => $form->createView()
        ]);
    }


}
