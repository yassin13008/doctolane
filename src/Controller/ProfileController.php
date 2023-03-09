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
        PatientsRepository $patients, 
        Request $request,
        EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();
        $form = $this->createForm(EditPatientFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            
            $this->addFlash('success', 'Profil mis a jour');
            return $this->redirectToRoute('profilePatient');
        }

    
        return $this->render('profile/editProfilePatient.html.twig', [
            'form' => $form->createView(),
        ]);
    }

// Route de modification la modification du mot de passe (pour les deux !!)
#[Route('/profilePatient/editPassword', name: 'editProfilePassword')]
public function editProfilePatientPassword(
    Request $request,
    PatientsRepository $repoPatient,
    ProfessionnalsRepository $repoProfessionnal,
    UserPasswordHasherInterface $userPasswordHasher,
    EntityManagerInterface $entityManager): Response
{

// Ici on vérifie si la requete envoyé est bien la requete post 


    if($request->isMethod('POST')){

        $user = $this->getUser();

        
        if($user->getRoles()=== ["ROLE_USER"]){

        $patient = $repoPatient->find($user);


        // Mtn on vérifie si les deux mot de passe sont les mêmes 

        if(empty($request->request->get('password')) && empty($request->request->get('password_confirm'))){

            $this->addFlash('danger', 'Vous n\'avez remplie aucun champs ');
            return$this->redirectToRoute('editProfilePassword');
        }

        if($request->request->get('password') === $request->request->get('password_confirm')){


            $patient->setPassword($userPasswordHasher->hashPassword($patient,$request->request->get('password')));

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre mot de passe à été mis à jour');
            return $this->redirectToRoute('profilePatient');


        }
        else{
            $this->addFlash('danger', 'Les deux mots de passe ne sont pas identiques !! ');
        }

    }

    }


    return $this->render('profile/editPass.html.twig');
}

                        // SECTION PROFESIONNEL 

// Route vers le profil du Professionnel 
    #[Route('/profileProfessionnal', name: 'profileProfessionnal')]
    public function profileProfessionnal(SpecialitiesRepository $repoSpecialities,): Response
    {

    $user = $this->getUser();
    $speciality_label_user = $repoSpecialities->find($user);


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


#[Route('/profileProfessionnal/editPassword', name: 'editProfessionnalPassword')]
public function editProfileProfessionnalPassword(
    Request $request,
    PatientsRepository $repoPatient,
    ProfessionnalsRepository $repoProfessionnal,
    UserPasswordHasherInterface $userPasswordHasher,
    EntityManagerInterface $entityManager): Response
{

// Ici on vérifie si la requete envoyé est bien la requete post 


    if($request->isMethod('POST')){

        $user = $this->getUser();

        if($user->getRoles()=== ["ROLE_DOCTOR"]){
        
        
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

    }


    return $this->render('profile/editPass.html.twig');
}
}
