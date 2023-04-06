<?php

namespace App\Controller;

use App\Entity\Patients;
use App\Entity\Professionnals;
use App\Entity\User;
use App\Form\PatientsRegistrationFormType;
use App\Form\ProfessionnalsRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{

                            // SECTION enregistrement de l'utilisateur PATIENT 

    // Ici se trouve la route d'enregistrement du profils utilisateur patient (n'oubliez pas y en a 2 )
    #[Route('/inscription', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {

        // ici je déclare la nouvelle class Patient

        $userPatient = new Patients();
        $form = $this->createForm(PatientsRegistrationFormType::class, $userPatient); 
        // Je crée ici le formulaire d'enregistrement avec la class  Patient Registration Form et l'entité patient 
        // Voir les détails sur les formulaires dans le dossier form concernée 

        // Ici j'envoie la requête
        $form->handleRequest($request);


        // Si ici tout est correctement envoyé et que le formulaire est valide, on va hash le mdp et persister les donnée en BDD
        if ($form->isSubmitted() && $form->isValid()) {
            
            $userPatient->setPassword(
                $userPasswordHasher->hashPassword(
                    $userPatient,
                    $form->get('password')->getData()
                )
            );

            $userPatient->setSlugValue(); // Je vais rajouter le slug ici 
            

            $entityManager->persist($userPatient);
            $entityManager->flush();
            

            // Message en cas de success et redirection sur la page login 
            // Je n'ai pas mis la connexion automatique pour laisser le champ à la possibilité d'envoyé un mail de confirmation 
            $this->addFlash('success', 'Profil enregistré, vous pouvez désormais vous connecter');
            return $this->redirectToRoute('connexion');
        }

        return $this->render('registration/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

                        // SECTION Professionnal, c'est exactement la même choses pour les utilisateurs
    #[Route('/inscriptionPro', name: 'registerPro')]
    public function registerProfessionnals(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $userProfessionnals = new Professionnals();
        $form = $this->createForm(ProfessionnalsRegistrationFormType::class, $userProfessionnals);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $userProfessionnals->setPassword(
                $userPasswordHasher->hashPassword(
                    $userProfessionnals,
                    $form->get('password')->getData()
                )
            );
            $userProfessionnals->setSlugValue(); // Je vais rajouter le slug ici 

            $entityManager->persist($userProfessionnals);
            $entityManager->flush();
            // do anything else you need here, like send an email

            $this->addFlash('success', 'Profil enregistré, vous pouvez désormais vous connecter');
            return $this->redirectToRoute('connexion');
        }

        return $this->render('registration/inscriptionPro.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
