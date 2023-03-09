<?php

namespace App\Controller;


use App\Form\EditPatientFormType;
use App\Form\EditProfessionnalFormType;
use App\Repository\PatientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SpecialitiesRepository;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfileController extends AbstractController
{

// Ce contrôller s'occuppe de la gestion des profils des utilisateurs, ici nous avons les utilisateurs (patients) 

// Route vers le profil du patient ! 
    #[Route('/profilePatient', name: 'profilePatient')]
    public function profilePatient(PatientsRepository $patients): Response
    {

        return $this->render('profile/patient.html.twig', [
            'controller_name' => 'ProfilePatient',
        ]);
    }

// Route de modification du profil du patient
    #[Route('/profilePatient/edit', name: 'editProfilePatient')]
    public function editProfilePatient(
        Request $request,
        EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser(); // Ici je récupère le profil qui est connecté grace à une fonction globale getUser de AbstractController

        $form = $this->createForm(EditPatientFormType::class, $user); // Ici je crée le formulaire basée sur la class Edit patient Form type

        // Pour voir les détais du formulaires se rendre sur src/form/Edit patient 

        $form->handleRequest($request); // ici j'envoie la requete 

        if ($form->isSubmitted() && $form->isValid()) {

            // Sur la vue (editPatient.html.twig), Il y a deja le formulaire de pré remplie en cas de modification d'un seul champs

            // Si le formulaire est soumis est que les champs sont, remplie je fais persister les données puis je les envoie en BDD

            $entityManager->persist($user);
            $entityManager->flush();


            // Notif de success en cas de réussite 
            $this->addFlash('success', 'Profil mis a jour');
            return $this->redirectToRoute('profilePatient');
        }

    
        return $this->render('profile/editProfilePatient.html.twig', [
            'form' => $form->createView(),
        ]);
    }

        // Route de modification la modification du mot de passe pour l'utilisateur (patient)
        // à l'avenir faudra réduire ce code 
    #[Route('/profilePatient/editPassword', name: 'editProfilePassword')]
    public function editProfilePatientPassword(
    Request $request,
    PatientsRepository $repoPatient,
    UserPasswordHasherInterface $userPasswordHasher,
    EntityManagerInterface $entityManager): Response
{

            // Ici on vérifie si la requete envoyé est bien la requete post 


    if($request->isMethod('POST')){

        // Ici je récupère les données de l'utilisateur (via la class userinterface car j'aurais besoin de cela pour récupérer son entités)
        $user = $this->getUser();

        // Ici je vais récupéré ses données via sa classe repository, ça me permettra d'avoir acces à la fonction setPassword() de l'entité répository
        $patient = $repoPatient->find($user);


        // Ici je vérifie que les champs ne soit pas vide si c'est le cas, je fais un retour de passe et je laisse le message 
        if(empty($request->request->get('password')) && empty($request->request->get('password_confirm'))){
            
            $this->addFlash('danger', 'Vous n\'avez remplie aucun champs ');
            return $this->redirectToRoute('editProfilePassword');
        }
        
        // Mtn on vérifie si les deux mot de passe sont les mêmes 
        if($request->request->get('password') === $request->request->get('password_confirm')){

            // Si tout est correct, je fais la modif du mdp et je hash le nouveau password et j'envoie les nouvelles données en BDD
            $patient->setPassword($userPasswordHasher->hashPassword($patient,$request->request->get('password')));

            $entityManager->persist($user);
            $entityManager->flush();

            // Message de retour si tout s'est bien passé et redirection sur le profils 
            // mettre('app_logout') si vous voulez que l'utilisateur se reconnecte  !!

            $this->addFlash('success', 'Votre mot de passe à été mis à jour');
            return $this->redirectToRoute('profilePatient');


        }
        // En cas ou les mots de passes ne sont pas bons !!
        else{
            $this->addFlash('danger', 'Les deux mots de passe ne sont pas identiques !! ');
        }



    }


    return $this->render('profile/editPass.html.twig');
}

                        // SECTION PROFESIONNEL (Les champs sont les mêmes, par sécurité j'ai répété le même système, possibilité de réduire le code)

// Route vers le profil du Professionnel 
    #[Route('/profileProfessionnal', name: 'profileProfessionnal')]
    public function profileProfessionnal(SpecialitiesRepository $repoSpecialities, ProfessionnalsRepository $professionnal): Response
    {

    $user = $this->getUser();

    $userProfessionnal = $professionnal->find($user);

    // dd($userProfessionnal->getSpeciality());

    // dd($user->getFirstname());
    $speciality_label_user = $repoSpecialities->find($userProfessionnal->getSpeciality());


        return $this->render('profile/professionnal.html.twig', [
            'speciality' => $speciality_label_user->getSpecialityLabel(),
        ]);
    }

// Route vers la modification du profil du professionnel de santé 

#[Route('/profileProfessionnal/edit', name: 'editProfileProfessionnal')]
public function editProfileProfessionnal(
    ProfessionnalsRepository $professionnalRepository, 
    Request $request,
    UserPasswordHasherInterface $userPasswordHasher,
    EntityManagerInterface $entityManager): Response
{

// Les champs sont à peu près les mêmes que pour l'utilisateur patient 
    $user = $this->getUser();
    $form = $this->createForm(EditProfessionnalFormType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $entityManager->persist($user);
        $entityManager->flush();
        // do anything else you need here, like send an email

        
        $this->addFlash('success', 'Profil mis a jour');
        return $this->redirectToRoute('profileProfessionnal');
    }


    return $this->render('profile/editProfileProfessionnal.html.twig', [
        'registrationForm' => $form->createView(),
    ]);
}

    // C'est la route de modif de mdp mais pour l'utilisateur professionnels 
    #[Route('/profileProfessionnal/editPassword', name: 'editProfessionnalPassword')]
    public function editProfileProfessionnalPassword(
    Request $request,
    ProfessionnalsRepository $repoProfessionnal,
    UserPasswordHasherInterface $userPasswordHasher,
    EntityManagerInterface $entityManager): Response
{

// Ici on vérifie si la requete envoyé est bien la requete post 


    if($request->isMethod('POST')){

        $user = $this->getUser();

            $professionnal = $repoProfessionnal->find($user);

            if(empty($request->request->get('password')) && empty($request->request->get('password_confirm'))){

                $this->addFlash('danger', 'Vous n\'avez remplie aucun champs ');
                return$this->redirectToRoute('editProfilePassword');
            }


        // Mtn on vérifie si les deux mot de passe sont les mêmes 

        if($request->request->get('password') === $request->request->get('password_confirm')){


            $professionnal->setPassword($userPasswordHasher->hashPassword($professionnal,$request->request->get('password')));

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre mot de passe à été mis à jour');
            return $this->redirectToRoute('profileProfessionnal');


        }
        else{
            $this->addFlash('danger', 'Les deux mots de passe ne sont pas identiques !! ');
        }
        

    }


    return $this->render('profile/editPass.html.twig');
}
}
