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
    // ROUTE DE L'AFFICHAGE DES DISPONIBILES DU PROFESSIONNEL DE SANTE 
    #[Route('/aviability', name: 'aviability')]
    public function index(AviabilityRepository $aviaRepo): Response
    {
        //Ici je récupère les disponibilités qu'a enregistré le professionnel de santé => Si y a rien un affichage différent lui sera montrée
        $aviaPro = $aviaRepo->find($this->getUser());
    

        return $this->render('aviability/index.html.twig', [
            'controller_name' => 'AviabilityController',
            'aviability' => $aviaPro
        ]);
    }

    // ROUTE DE L'EDTION DES DISPONIBILITES ET LA GENERATION DES CRENEAUX 
    #[Route('/aviability/edit/', name: 'aviabilityEdit')]
    public function add(AviabilityRepository $aviaRepo, Request $request, AppointmentRepository $appRepo, EntityManagerInterface $manager):Response
    {
        $aviaPro = $aviaRepo->find($this->getUser()); // Je récupère les disponibilités déja enregistrer par le professionnel de santé 

        $appProAll = $appRepo->findByProfessionalId($this->getUser()); 
        // Je récupère tous les rendez vous du professionnel de santé pour éviter par la suites des erreurs de génération des rendez vous 

        $aviaOldStart = $aviaPro->getStartDate(); // Je récupère la date de début de disponiblité inséré auparavant par l'utilisateur
        $aviaOldEnd = $aviaPro->getEndDate(); // Je fais la même chose pour la date de fin de ses disponiblités

        $form = $this->createForm(AviabilityType::class); // J'utilise le formulaire de disponibilité 

        $form->handleRequest($request); // J'envoie la requête ici

        if($form->isSubmitted() && $form->isValid()){

            // Ici si le formulaire est soumis et valide, je vais travailles sur les dates et les données en question pour que la génération des rendez vous se fasse parfaitement

            $timeZone = new DateTimeZone('Europe/Paris'); // Ici je récupère le fuseau horaire 
            $today = new DateTime(); // Ici je récupère la date du jours

            $data = $form->getData(); // Je récupères les données du formulaire saisie et je vais les injecter dans une nouvelles variables 

            
            $newStartDate = $data->getStartDate()->setTimeZone($timeZone); // Nouvelle date de début de dispo
            $newEndDate = $data->getEndDate()->setTimeZone($timeZone); // Nouvelles date de fin de dispo
            $newDurationDate = $data->getDurationDate(); // Je récupère la durée des rendez vous en minutes (c'est un type INTEGER pas DATETIME)
            $newGapDate = $data->getGapDate(); // Je fais la même chose qu'au dessus mais ici cela concerne le delais d'attentes entre deux rendez vous 
            $newStartTime = $data->getStartTime(); // Ici c'est à quelle heure la personne comment sa journée
            $newEndTime = $data->getEndTime(); // Ici c'est à quelle heure prends fin la journée du professionnel de santé 

            // Une fois tout cela fait, je vais faire un contrôle de date pour éviter toutes les erreurs à venir 

            // Si la date de l'ancienne fin de disponibilité est supérieure à la nouvelle date saisie 
            if($aviaOldEnd > $newStartDate){

                $this->addFlash('danger','Vos nouvelles disponibilité dois être après la date de fin de l\'ancienne saisie auparavant ');
                return $this->redirectToRoute('aviabilityEdit');

            }
            // Si la nouvelle date saisie est inférieur à la date d'aujourd'hui 
            if($newStartDate < $today){

                $this->addFlash('danger','Vos disponibilités doivent se situer dans le futur');
                return $this->redirectToRoute('aviabilityEdit');

            }
            // Ici je boucle sur tous les créneau déjà enregistrer par le professionnel de santé 
            for ($i=0; $i < count($appProAll) ; $i++) { 

                // Si la date de fin d'un des rendez-vous est supérieur au début des nouvelles disponibilté = Message d'erreur
                if($appProAll[$i]->getEnd() > $newStartDate){
                    
                    $this->addFlash('danger','Un créneau est déjà pris, veuillez supprimez ce rendez vous ou mettez une date de début de disponibilité supérieur à ce ou ces créneaux ou supprimer les crénaux génant dans votre liste ');
                    return $this->redirectToRoute('aviabilityEdit');
    
                }
            }
            // Si Tout est bon j'enregistre les nouvelles disponibilités
            $aviaPro->setStartDate($newStartDate);
            $aviaPro->setEndDate($newEndDate);
            $aviaPro->setDurationDate($newDurationDate);
            $aviaPro->setGapDate($newGapDate);
            $aviaPro->setStartTime($newStartTime);
            $aviaPro->setEndTime($newEndTime);

            $aviaRepo->save($aviaPro, true); // Je sauvegarde les nouvelles disponibilités 

            // Ici je prépares dans des nouvelles variables les données enregistrer par l'utilisateur pour faire la génération des créneaux 


            $datesRdv = []; // J'initialise un tableau vide ici pour récupérer tous les heures de départ et de fin 
            // Par défaut le samedi et le dimanche ne sont pas compter




            // Boucle pour générer les rendez-vous
            while ($newStartDate <= $newEndDate) {

                // Vérifier si l'heure actuelle est entre 10h et 18h
                $heureCourante = $newStartDate->format('H:i:s');

                    if ($heureCourante >= $newStartTime->format('H:i:s') && $heureCourante <= $newEndTime->format('H:i:s')) {
                        // Ajouter la date de rendez-vous
                        $datesRdv[] = $newStartDate->format('Y-m-d H:i:s');


                        // Ajouter la durée du rendez-vous
                        $newStartDate->add(new DateInterval('PT' . $newDurationDate . 'M'));

                        // Ajouter le délai d'attente entre les rendez-vous
                        $newStartDate->add(new DateInterval('PT' . $newGapDate . 'M'));

                    } 
                    else 
                    {
                        // Passer à la plage horaire suivante
                        $newStartDate->add(new DateInterval('PT1M'));
                }
            }

            // dd($datesRdv);
        // Maintenant que mon tableau d'heure est remplie je vais crée un tableau vide qui va me permettre d'enregistrer les nouveux créneau dans un tableau et les persister en BDD
        $appointments= [];

        // Je boucle sur mes heures de rendez-vous pré enregistré
                for($i= 0; $i < count($datesRdv); $i++){

                        $appointment = new Appointment(); // Je crée un nouvelles objet appointments 

                        $appStart= \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone); // Insertion de la date de début du créneau
                        $appEndBf = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone); 
                        $appEnd = $appEndBf->add(new DateInterval('PT' . $newDurationDate . 'M')); // Insertion de la date de fin plus le délais entre les deux 
            
                        // Enregistrement dans la variable appointment
                        $appointment->setStart($appStart);
                        $appointment->setEnd($appEnd);
                        $appointment->addProfessionnal($this->getUser());



                    // Persistance et injection en base de donnée
                    $manager->persist($appointment);
                    $manager->flush();

                }


                // Message de success
                $this->addFlash('success','Vos disponibilités ont été enregistrées, allez voir la liste de vos rendez-vous, des créneaux ont été généré automatiquement, Vous pouvez        modifier ou supprimer le rendez vous insérer ci besoin');
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
        $timeZone = new DateTimeZone('Europe/Paris'); // Insertion du fuseau horaire dans une variable
        $aviability = new Aviability(); // Création d'un objet disponibilité

        $doctor = $this->getUser(); // Récupérer le professionnel de santé 
        
        
        $form = $this->createForm(AviabilityType::class); // Création du formulaire d'ajout de disponibilité

        $form->handleRequest($request); // envoie de la requete 

        if($form->isSubmitted() && $form->isValid()){ // Si le formulaire est soumis et valide 

            $aviabilityForm = $form->getData(); // Je récupère les données

            $debutDispo = $aviabilityForm->getStartDate()->setTimeZone($timeZone); // debut de disponibilité + fuseau horaires
            $finDispo = $aviabilityForm->getEndDate()->setTimeZone($timeZone); // fin de disponibilité + fuseau horaires
 
            $startTimeZ = $aviabilityForm->getStartTime()->setTimeZone($timeZone); // heure disponible avec fuseau horaire ( début )
            $endTimeZ = $aviabilityForm->getEndTime()->setTimeZone($timeZone); // heure disponible avec fuseau horaire ( fin )

            $startTime = $startTimeZ->format('H:i'); // Format chaine de caractère avec heure et minutes
            $endTime = $endTimeZ->format('H:i'); // Format chaine de caractère avec heure et minutes

            $dureeRdv = $aviabilityForm->getDurationDate(); // temps du rendez vous en minutes ( ! type integer ici )
            $delaiAttente = $aviabilityForm->getGapDate(); // délais d'attentes entre les rds ( ! type integer ici )

            // ICi je vais insérer les données du formulaire et les faires persister en base de données

            $aviability->setStartDate($debutDispo);
            $aviability->setEndDate($finDispo);
            $aviability->setStartTime($startTimeZ);
            $aviability->setEndTime($endTimeZ);
            $aviability->setGapDate($delaiAttente);
            $aviability->setDurationDate($dureeRdv);
            $aviability->addAviabilityPro($doctor);

            $manager->persist($aviability);
            $manager->flush();

            // Ici je vais crée un tableau vide pour générer les créneaux
            // Ci besoin voir edition qui est plus détailler en commentaire 
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

            $appStart= \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone); // J'insère la date de début du rendez vous dans une variable
            // if(array_key_exists($datesRdv[$i+1], $datesRdv)){

            //     $appEnd = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone);

            //     $appEnd->add(new DateInterval('PT' . $dureeRdv . 'M'));
            // }
            $appEndBf = \DateTime::createFromFormat('Y-m-d H:i:s', $datesRdv[$i], $timeZone); // J'insère la date de fin du rendez vous dans une variable 
            $appEnd = $appEndBf->add(new DateInterval('PT' . $dureeRdv . 'M')); // Je rajoute 
            

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
