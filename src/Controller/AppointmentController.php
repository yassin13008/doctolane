<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Repository\AppointmentRepository;
use App\Repository\PatientsRepository;
use App\Repository\ProfessionnalsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        $appointment = new Appointment();

        $proId = $id;
        $patientId = $this->getUser()->getId();

        $pro = $proRepo->find($proId);
        $patient = $patientRepo->find($patientId);

        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        
        // $appointment->setProfessionnal($pro);
        $appointment->addPatient($patient);
        $appointment->addProfessionnal($pro);

        $manager->persist($appointment);
        $manager->flush();

            $this->addFlash('success', 'Votre rendez vous à été enregistrer');
            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appointment/new.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
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
