<?php


namespace App\Controller;


use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact/{id}', name: 'contactPro')]
    public function index($id, ProfessionnalsRepository $proRepo, Request $request, MailerInterface $mailer): Response
    {
        $dd = $_ENV['MAILER_DSN'];
        // Ici je vais mettre les données dont j'ai besoin
        $transport = Transport::fromDsn($dd);
        $mailer = new Mailer($transport);  
        $pro = $proRepo->find($id); // Retrouver le professionnel à qui on veut envoyer l'email


        $form = $this->createForm(ContactType::class); // Création du formulaire avec le ContactType
        $form->handleRequest($request); // Envoie de la requête 

        if($form->isSubmitted() && $form->isValid()){ // Si le formulaire est soumis et est bien valide 

            $dataSbj = $form->getData()['subject'];
            $dataMsg = $form->getData()['message'];

            $email = (new Email())
            ->from('no-reply@doctolane.com')
            ->to($pro->getEmail())
            // ->priority(Email::PRIORITY_HIGHEST)
            ->subject($dataSbj)
            ->text('$dataMsg
            Voici les coordonnées du patient si vous avez besoin de le contacter.
            Nom : '. $pro->getLastname().'
            Prenom : '.$pro->getFirstname().'
            Mail : '.$pro->getEmail().'
            Numéro de téléphone : '.$pro->getPhoneNumber().'');

            $mailer->send($email);



            $this->addFlash('success', 'Votre message à été envoyé, il vous contactera des que possible');
            return $this->redirectToRoute('home');

        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }
}
