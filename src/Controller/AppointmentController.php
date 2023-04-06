<?php

namespace App\Controller;

use DateTime;
use DateTimeZone;
use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Form\SubjectType;
use App\Repository\PatientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AppointmentRepository;
use App\Repository\AviabilityRepository;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('professionnal/appointment')]
class AppointmentController extends AbstractController
    // LISTE DE TOUS LES RENDEZ VOUS
{
    #[Route('/', name: 'app_appointment_index', methods: ['GET'])]
    public function index(AppointmentRepository $appointmentRepository, PatientsRepository $patientRepo): Response
    {

        $user = $this->getUser();
        $patients = $patientRepo->findAll($user);

        // dd($patients);

        // dd($user->getAppointments()->toArray());


        return $this->render('appointment/index.html.twig', [
            'appointments' => $user->getAppointments()->toArray() ,
            'patients' => $patients
        ]);
    }
    // AJOUT D'UN CRENEAU AU PATIENT
    #[Route('/add/{id}', name: 'addAppointment', methods: ['GET', 'POST'])]
    public function add($id, Request $request,AppointmentRepository $appointmentRepository , EntityManagerInterface $manager): Response
    {
        $appointment = $appointmentRepository->find($id);

        $form = $this->createForm(SubjectType::class);

        // Apres je prépare la request 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $subject = $form->getData()['Title'];

            $appointment->setTitle($subject);
            $appointment->setIsDispo(false);

            $appointmentRepository->save($appointment, true);

            $this->addFlash('success', 'Votre créneau à été réservé');
            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        // dd($appointment);

        return $this->render('appointment/add.html.twig', [
            'appointment' => $appointment,
            'form' => $form->createView()
        ]);
    }

    // $appointmentRepository->find($user->getAppointments()->toArray()

    // ROUTE DE LA CREATION D'UN RENDEZ VOUS POUR LES DOCTEUR 
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


        $proId = $this->getUser()->getId();

    
        // Je récupère l'objet' des professionnels  grace à l'id récupérer au préalable 
        $pro = $proRepo->find($proId);


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

            for ($i=0; $i < sizeof($calendarDoctorEvents) ; $i++) { 
            
                // Si la date de début de rendez vous corresponds à une date de début de rdv déja inscrit dans la bdd
                    if($calendarDoctorEvents[$i]->getStart() == $debut){
    
                        // dump($calendarDoctorEvents[$i]->getStart());
                        // dd($debut);
                        $this->addFlash('danger', 'Un rendez vous à été pris à cette date ');
                        return $this->redirectToRoute('newAppointment',['id' => $id]);
                    }
                // Si le rendez vous se situe sur un autre rendez vous 
                    if($calendarDoctorEvents[$i]->getStart() > $debut && $fin > $calendarDoctorEvents[$i]->getStart() && $fin < $calendarDoctorEvents[$i]->getEnd()){
    
                        $this->addFlash('danger', 'Entre le début et la fin de votre rendez vous, il ne doit pas avoir un rendez vous, recherchez un autre créneau disponible ');
                        return $this->redirectToRoute('newAppointment',['id' => $id]);
                    }
                }
            
            if($debut < $today ){
                    $this->addFlash('danger', 'Votre rendez vous doit être dans le futur');
                    return $this->redirectToRoute('newAppointment',['id' => $id]);
            }
                // Si la date du début est supérieur à la date de fin
            if($debut > $fin ){
                    $this->addFlash('danger', 'Vous ne pouvez pas avoir une date de début superieur à la date de fin ');
                    return $this->redirectToRoute('newAppointment',['id' => $id]);
            }

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


// AFFICHAGE D'UN RENDEZ VOUS 
    #[Route('show/{id}', name: 'app_appointment_show', methods: ['GET'])]
    public function show(Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {

        return $this->render('appointment/show.html.twig', [
            'appointment' => $appointment,
        ]);
    }

// MODIFICATION D'UN RENDEZ VOUS SELECTIONNEE

    #[Route('/{id}/edit', name: 'app_appointment_edit', methods: ['GET', 'POST'])]
    public function edit($id, Request $request, Appointment $appointment, AppointmentRepository $appointmentRepository, AviabilityRepository $aviaRepo): Response
    {

        
        // Affichage du calendrier 
        $user = $this->getUser();

        $aviability = $aviaRepo->findBy(['id'=>$user]);

    
    $patientId = $id; // Je récupère l'id du patient ici 

    $appointments = $appointmentRepository->findByProfessionalId($user); // Je récupère tous les rdv par professionnel (calendrier)
    $oldAppointmentStart = $appointmentRepository->find($patientId)->getStart(); // Ici je récupère l'ancien rendez vous pour le comparer au autres
    $oldAppointmentEnd = $appointmentRepository->find($patientId)->getEnd(); // Ici je récupère l'ancien rendez vous pour le comparer au autres


    $calendarDoctorEvents = $appointments; // Je les contients dans une autre variable car je vais boucler dessus 


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

    // Création du formulaire
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $today = new DateTime(); // Je récupère ici la date du jour
            $timeZone = new DateTimeZone('Europe/Paris'); // je récupère le timezone Europe

            $debut = $form->getData()->getStart()->setTimeZone($timeZone); // Heure de début du rendez vous en fuseau europe
            $fin =  $form->getData()->getEnd()->setTimeZone($timeZone);// Heure de fin du rendez vous en fuseau europe
            //Maintenant, je vais comparer les dates necessaires
            $diff = $debut->diff($fin); // Ici je récupère la différence entre l'heure de debut et de fin de rdv


            //Je vais boucler avec les autres rdvs 
            // Ici corresponds au rdv actuelle que l'on modifie, le contrôle s'effectuant en bas 
            //Nous on cherches d'abord a trouver si la date corresponds au autre rdv pour eviter tout problème (même s'il a son calendrier en face des yeux)

            // Ici je vais boucler dans le tableau contenant les rendez vous inscrit en rapport avec le professionnel de santé en question 
            for ($i=1; $i < sizeof($calendarDoctorEvents) ; $i++) { 
            
                // Si la date de début de rendez vous corresponds à une date de début de rdv déja inscrit dans la bdd
                    if($calendarDoctorEvents[$i]->getStart()->setTimeZone($timeZone) == $calendarDoctorEvents[0]->getStart()->setTimeZone($timeZone)){
    
                        // dump($calendarDoctorEvents[$i]->getStart());
                        // dump($calendarDoctorEvents);
                        // dd($oldAppointmentStart);
                        $this->addFlash('danger', 'Il existe déja un rendez vous à cette effets ');
                        return $this->redirectToRoute('app_appointment_edit',['id' => $patientId]);
                    }
                // Si la date de debut de rdv se trouve entre une date de debut et une date de fin d'un rendez vous enregistrer
                    if($calendarDoctorEvents[$i]->getStart() < $calendarDoctorEvents[0]->getStart()->setTimeZone($timeZone) && $calendarDoctorEvents[0]->getStart()->setTimeZone($timeZone) < $calendarDoctorEvents[$i]->getEnd()){

                        $this->addFlash('danger', 'Vous ne pouvez pas prendre de rendez vous 30 min après un rendez vous ');
                        return $this->redirectToRoute('app_appointment_edit',['id' => $patientId]);
                    }
                }

            if($debut <= $oldAppointmentStart->setTimeZone($timeZone) ){
                    $this->addFlash('danger', 'Votre nouveau rendez vous dois se situer à une date ultérieur à l\ancient');
                    return $this->redirectToRoute('app_appointment_edit',['id' => $patientId]);
            }
            if($debut < $today ){
                $this->addFlash('danger', 'Votre rendez vous doit être dans le futur');
                return $this->redirectToRoute('app_appointment_edit',['id' => $patientId]);
            }
            // Si la date du début est supérieur à la date de fin
            if($debut > $fin ){
                $this->addFlash('danger', 'Vous ne pouvez pas avoir une date de début superieur à la date de fin ');
                return $this->redirectToRoute('app_appointment_edit',['id' => $patientId]);
            }

            $appointmentRepository->save($appointment, true);

            return $this->redirectToRoute('app_appointment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appointment/edit.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
            'data' => $data
        ]);
    }

// SUPPRESSION D'UN RENDEZ VOUS 
    #[Route('/{id}', name: 'app_appointment_delete', methods: ['POST'])]
    public function delete(Request $request, Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appointment->getId(), $request->request->get('_token'))) {
            $appointmentRepository->remove($appointment, true);
        }

        return $this->redirectToRoute('app_appointment_index', [], Response::HTTP_SEE_OTHER);
    }
}
