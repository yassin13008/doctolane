<?php

namespace App\Controller;


use App\Form\ResetPassNewFormType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use App\Repository\PatientsRepository;
use Symfony\Component\Mailer\Transport;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'connexion')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
    
    // Condition pour vérifier si l'utilisateur est déja connecté !!!
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    // Route de déconnexion 

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    
    
    // Ici je vais crée la route qui va me permettre d'envoyer un mail pour la récupération du mdp ( METHODE JWT token )
    // Il y aura plusieur route, celle-ci est la route de la demande 
    #[Route(path: '/oublieMDP', name: 'forgottenPass')]
    public function forgottenPass(
        Request $request,
        PatientsRepository $patientUser,
        ProfessionnalsRepository $proUser,
        TokenGeneratorInterface $tGI,
        EntityManagerInterface $manager,
        MailerInterface $mailer): Response
    {
        $dd = $_ENV['MAILER_DSN']; // mailer dsn ici

        $transport = Transport::fromDsn($dd);
        $mailer = new Mailer($transport); 

// Ici je crée le formulaire avec la class du formulaire requis et j'envoie la requête 
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

// Ici je controle si le formulaire est soumis et est valide 
        if($form->isSubmitted() && $form->isValid()){

            // Si c'est le cas, on va recherché l'utilisateur par son email =>
            // Ici, on a deux type d'utilisateur du coup on va mettre une condition qui va chercher l'autre utilisateur si le premier type d'utilisateur n'est pas trouvé grace à son email
            // Sinon on renvoie un message d'erreur 
            // Je met ici user = null pour contrôler les conditions suivants
        $user= null;

        // Si l'utilisateur est un patient => on récupère ses données dans la variable $user
        if($patientUser->findOneByEmail($form->get('email')->getData()) == true){
            $user = $patientUser->findOneByEmail($form->get('email')->getData());
        }
        // Si l'utilisateur est un professionnel => on récupère ses données dans la variable $user
        elseif($proUser->findOneByEmail($form->get('email')->getData()) == true){
            $user = $proUser->findOneByEmail($form->get('email')->getData());
        }
        // Si les données ont bien été récupéré, on va crée le token en question 
        if($user){

            // Création du token grace au service de symfony tokengeneratoninterface (dsl pour les maj)
            $token = $tGI->generateToken();

            // Et maintenant, on va insérer ce token dans la column reset token de l'utilisateur puis persister les données et les flushs !!
            $user->setResetToken($token);

            $manager->persist($user);
            $manager->flush();

            // Si le token est rentré dans la bdd, on va crée le lien de ré initialisation de mdp
            // On va créer une route qui servira uniquement à cette ré initialisation (voir route resetPass)
            // Le premier paramettre c'est la route qu'on a crée en bas 
            $url = $this->generateUrl('resetPass', ['token'=>$token], UrlGeneratorInterface::ABSOLUTE_URL);

            // C'est cette url qu'on va envoyer par email donc mtn passons à l'envoie d'email 

            $context = compact('url','user');

            $email = (new Email())
            ->from('no-reply@doctolane.com')
            ->to($user->getEmail())
            // ->priority(Email::PRIORITY_HIGHEST)
            ->subject("Ré initialisation de votre mot de passe ")
            ->text('This is an important message!')
            ->html('<strong>Voici le lien qui va vous permettre de recrée votre mot de passe </br > <a>'.$url.'</a> </strong>');

            $mailer->send($email);

            $this->addFlash('success', 'Nous vous avons envoyé un email de ré initialisation');
            return $this->redirectToRoute('connexion');

        }
        // Si $user est tjr null c'est que le compte n'existe pas et on le renvoie sur la barre de connexion avec une petite indication des familles 
        elseif($user == null)
        {
            $this->addFlash('danger', 'Un problème est survenu');
            return $this->redirectToRoute('connexion');
        }


        }
        return $this->render('security/reset_password_request.html.twig',[
            'requestPassForm' => $form->createView()
        ]);
    }

// Ici c'est la route qui va nous permettre de ré initialisé le mot de passe 
// Il faut avant d'acceder à cette route le token de l'utilisateur 
        #[Route(path:'oublieMDP/{token}', name:'resetPass')]
        public function resetPass(
            string $token,
            Request $request,
            PatientsRepository $patientUser,
            ProfessionnalsRepository $proUser,
            UserPasswordHasherInterface $hashPass,
            EntityManagerInterface $manager
        ):Response
        {

            // Ici je controle si le token que je reçoit appartient à un utilisateur patient ou un professionnel
            if($patientUser->findOneByResetToken($token) == true){
                $user = $patientUser->findOneByResetToken($token);
            }
            // Si l'utilisateur est un professionnel => on récupère ses données dans la variable $user
            elseif($proUser->findOneByResetToken($token) == true){
                $user = $proUser->findOneByResetToken($token);;
            }
            else{
                $this->addFlash('danger', 'L\'utilisateur n\'est pas reconnu');
                return $this->redirectToRoute('home');
            }

            $form = $this->createForm(ResetPassNewFormType::class);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                // encode the plain password
                $user->setPassword(
                    $hashPass->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
    
                $manager->persist($user);
                $manager->flush();
                // do anything else you need here, like send an email
    
                $this->addFlash('success', 'Votre mot de passe à été mis à jour ');
                return $this->redirectToRoute('connexion');

            }

            return $this->render('security/resetNP.html.twig', [
                'user' => $user,
                'formPass' => $form->createView()
            ]);
        }
    
}
