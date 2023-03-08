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
    #[Route('/inscription', name: 'register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $userPatient = new Patients();
        $form = $this->createForm(PatientsRegistrationFormType::class, $userPatient);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $userPatient->setPassword(
                $userPasswordHasher->hashPassword(
                    $userPatient,
                    $form->get('password')->getData()
                )
            );
            

            $entityManager->persist($userPatient);
            $entityManager->flush();
            // do anything else you need here, like send an email

            

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

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

            $entityManager->persist($userProfessionnals);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/inscriptionPro.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
