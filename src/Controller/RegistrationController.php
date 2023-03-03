<?php

namespace App\Controller;

use App\Entity\Doctors;
use App\Form\RegistrationFormType;
use App\Repository\ExpertisesRepository;
use App\Repository\SpecialitiesRepository;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/inscriptionPDS', name: 'inscriptionPDS')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager, SpecialitiesRepository $specialityRepository, ExpertisesRepository $expertisesRepository): Response
    {
        $specialities = $specialityRepository->findAll();
        $expertises = $expertisesRepository->findAll();
        $user = new Doctors();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/inscriptionPDS.html.twig', [
            'registrationForm' => $form->createView(),
            'specialities' => $specialities,
            'expertises' => $expertises
        ]);
    }
}
