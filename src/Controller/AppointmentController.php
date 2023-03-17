<?php

namespace App\Controller;

use DateTime;
use DateTimeZone;
use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Repository\PatientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AppointmentRepository;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('professionnal/appointment')]
class AppointmentController extends AbstractController
{
    #[Route('/', name: 'app_appointment_index', methods: ['GET'])]
    public function index(AppointmentRepository $appointmentRepository): Response
    {

        $user = $this->getUser();

        // dd($user->getAppointments()->toArray());


        return $this->render('appointment/index.html.twig', [
            'appointments' => $user->getAppointments()->toArray() ,
        ]);
    }

    // $appointmentRepository->find($user->getAppointments()->toArray()


    #[Route('/new/{id}', name: 'newAppointment', methods: ['GET', 'POST'])]
    public function new($id, Request $request, AppointmentRepository $appointmentRepository, PatientsRepository $patientRepo, ProfessionnalsRepository $proRepo, EntityManagerInterface $manager): Response
    {
        // Récupération du calendrier et transformation des disponibilités du professionnel de santé 
        // On récupère tous les rendez-vous correspondant au professionnels de santé
        // Recup le pro en question

        // Voir la custom query
        $appointments = $appointmentRepository->findByProfessionalId($id);


        $calendarDoctorEvents = $appointments;


        //Je vais initialisé une variable a null en cas ou aucun rendez vous n'a été pris avec cette personne
        $rdvs = [];

        // Ici, je vais mettre les données que j'ai récupérer dans un tableau => cela va me servir à parser ses données en JSON pour les afficher avec Fullcalendar
        foreach ($calendarDoctorEvents as $calendarDoctorEvent) {
            # code...
            

            $rdvs[]= [
                'id' => $calendarDoctorEvent->getId(),
                'start' => $calendarDoctorEvent->getStart()->format('Y-m-d H:i'),
                'end' => $calendarDoctorEvent->getEnd()->format('Y-m-d H:i'),
            ];

        }


        // Maintenant que j'ai rentrés les rendez vous dans un tableau, je vais parser les données en JSON
        $data = json_encode($rdvs);

        //FIN DE LA PREMIERE PARTIE 
        //DEBUT DE LA DEUXIEME PARTIE 

        // ici je vais crée un nouveau rendez vous 

        $appointment = new Appointment();

        // Ici je vais récupérer l'id qui correspont au professionnel de santé inscrit sur le site 
        // Je récupère par la même occassion les données de l'utilisateur pour l'enregistrer dans la table Appointment 


        $proId = $id;
        $patientId = $this->getUser()->getId();

        // Je récupère l'objet' des professionnels et des patients grace à l'id récupérer au préalable 
        $pro = $proRepo->find($proId);
        $patient = $patientRepo->find($patientId);

        // Je créer le formulaire à la class AppointType form 
        $form = $this->createForm(AppointmentType::class, $appointment);

        // Apres je prépare la request 
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {

            // Si le formulaire est valides je vais récupérer les données de mon formulaires et effectuer des controlles avant de persister les données en BDD
            $today = new DateTime(); // Je récupère ici la date du jour
            $timeZone = new DateTimeZone('Europe/Paris'); // je récupère le timezone Europe

            $debut = $form->getData()->getStart()->setTimeZone($timeZone); // Heure de début du rendez vous en fuseau europe
            $fin =  $form->getData()->getEnd()->setTimeZone($timeZone);// Heure de fin du rendez vous en fuseau europe
            //Maintenant, je vais comparer les dates necessaires
            $diff = $debut->diff($fin); // Ici je récupère la différence entre l'heure de debut et de fin de rdv

            // Ici je vais boucler dans le tableau contenant les rendez vous inscrit en rapport avec le professionnel de santé en question 
            for ($i=0; $i < sizeof($calendarDoctorEvents) ; $i++) { 
            
            // Si la date de début de rendez vous corresponds à une date de début de rdv déja inscrit dans la bdd
                if($calendarDoctorEvents[$i]->getStart() == $debut){

                    // dump($calendarDoctorEvents[$i]->getStart());
                    // dd($debut);
                    $this->addFlash('danger', 'Un rendez vous à été pris à cette date ');
                    return $this->redirectToRoute('newAppointment',['id' => $id]);
                }
            // Si la date de debut de rdv se trouve entre une date de debut et une date de fin d'un rendez vous enregistrer
                if($calendarDoctorEvents[$i]->getStart() < $debut && $debut < $calendarDoctorEvents[$i]->getEnd()){

                    $this->addFlash('danger', 'Vous ne pouvez pas prendre de rendez vous 30 min après un rendez vous ');
                    return $this->redirectToRoute('newAppointment',['id' => $id]);
                }
            }
            // Si la date du début du rdv est inferieur à la date actuelle
            if($debut < $today ){
                $this->addFlash('danger', 'Votre rendez vous doit être dans le futur');
                return $this->redirectToRoute('newAppointment',['id' => $id]);
            }
            // Si la date du début est supérieur à la date de fin
            if($debut > $fin ){
                $this->addFlash('danger', 'Vous ne pouvez pas avoir une date de début superieur à la date de fin ');
                return $this->redirectToRoute('newAppointment',['id' => $id]);
            }
            //Si L'ecart entre le debut du rdv et la fin du rdv est sup à 1heures
            if($diff->h > 1 || $diff->h == 1 && $diff->i > 0){
                $this->addFlash('danger', 'Votre rendez vous ne peux dépasser plus d\'une heure ');
                return $this->redirectToRoute('newAppointment',['id' => $id]);
            }
        // Si tout est carré on insert les professionnels et les patients 

        $appointment->addProfessionnal($pro);
        $appointment->addPatient($patient);

        // on fait persister les donnée et on les insère dans la base de donnée 
            $manager->persist($appointment);
            $manager->flush();

            $this->addFlash('success', 'Votre rendez vous à été enregistrer');
            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }


        return $this->renderForm('appointment/new.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
            'data'=> $data
        ]);
    }

    #[Route('show/{id}', name: 'app_appointment_show', methods: ['GET'])]
    public function show(Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {

        return $this->render('appointment/show.html.twig', [
            'appointment' => $appointment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_appointment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $appointmentRepository->save($appointment, true);

            return $this->redirectToRoute('app_appointment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appointment/edit.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appointment_delete', methods: ['POST'])]
    public function delete(Request $request, Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appointment->getId(), $request->request->get('_token'))) {
            $appointmentRepository->remove($appointment, true);
        }

        return $this->redirectToRoute('app_appointment_index', [], Response::HTTP_SEE_OTHER);
    }
}
