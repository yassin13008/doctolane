<?php

namespace App\Controller;


use App\Form\SearchProType;
use App\Repository\ProfessionnalsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchProController extends AbstractController
{
    #[Route('/search/pro', name: 'app_search_pro')]
    public function index(Request $request, ProfessionnalsRepository $professionnalsRepository): Response
    {

        // Ici je vais déclaré ses variables null pour le moments, je les remplirais selon les données qu'aura remplie l'utilisateur
        $professionals = null;
        $postalCodeOrCity = null;
        $speciality = null;
        
        // Ici je crée le formulaire et j'envoie la requetê
        $form = $this->createForm(SearchProType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {

            //Si le form est soumis et valid, on va récupérer les données de ce formulaires
            // En fonction des données récupérer une action sera faire 
            $data = $form->getData();

            // Si l'utilisateur à remplis le champs code postal ou ville et le champs spécialité, On va effectuer une recherches sur ces deux paramettres
            if ($data["postalCodeOrCity"] != null && $data['speciality'] != null) {
                
                // Je récupère la données spécialité saisie
                $spe = $data['speciality'];
                // Je récupère la données ville ou code postal ici
                $cityPost = $data['postalCodeOrCity'];

                // Dans cette variablie professionnals, je vais récupérer le resultat de ma requete sql que j'ai crée dans le professionnal répository (voir class professionnalRépository)
                $professionals = $professionnalsRepository->findBySpecialityAndCityPostalCode($spe, $cityPost);


                // Si la variable est vide, c'est que la recherche n'a rien donnée et donc on va prévenir l'utilisateur 
                if(empty($professionals)){

                    $this->addFlash('warning', 'Malheuresement, nous n\'avons pas de professionnel inscrit travaillant autour de chez vous ni avec cette spécialité  ');
                    return $this->redirectToRoute('app_search_pro');
                }


                // Sinon, on retourne les variables dont on a besoin, elles vont nous permettre de créer une carte de profils pour chaque utilisateur 
                return $this->render('search_pro/index.html.twig', [
                        'controller_name' => 'SearchProController',
                        'form' => $form->createView(),
                        'professionals' => $professionals,
                        'postalCodeOrCity'=> $postalCodeOrCity,
                        'speciality' => $speciality
                    ]);
            }
            // Dans le cas ou l'utilisateur n'a renseigné que le code postal ou la ville, 
            if($data["postalCodeOrCity"] != null ){
            
            // On récupère la données dont on a besoin 
            $postalCodeOrCity = $data['postalCodeOrCity'];
    
            // Ici, on va effectuer une recherche via notre requête sql qu'on a crée (voir professionnal répository)
            $professionals = $professionnalsRepository->findByCodePostalOuVille($postalCodeOrCity);

            //Si le résultat ne donne rien, on renvoie un msg d'erreur
            if(empty($professionals)){

                $this->addFlash('warning', 'Malheuresement, nous n\'avons pas de professionnel inscrit travaillant autour de chez vous  ');
                return $this->redirectToRoute('app_search_pro');
            }

            // Sinon on envoie les données à la vue 
                return $this->render('search_pro/index.html.twig', [
                    'controller_name' => 'SearchProController',
                    'form' => $form->createView(),
                    'professionals' => $professionals,
                    'postalCodeOrCity'=> $postalCodeOrCity,
                    'speciality' => $speciality
                ]);
            }
            //On refait la m$eme chose mais pour les spécialité 
            // Dans le cas ou les deux sonts nuls, on renvoie un message directement depuis la vue 
            elseif($data['speciality'] != null){

                $speciality = $data['speciality'];
    
                $professionals = $professionnalsRepository->findBySpeciality($speciality);

                if(empty($professionals)){

                    $this->addFlash('warning', 'Malheuresement, nous n\'avons pas de professionnel avec cette spécialité inscrit chez nous ');
                    return $this->redirectToRoute('app_search_pro');
                }

                return $this->render('search_pro/index.html.twig', [
                    'controller_name' => 'SearchProController',
                    'form' => $form->createView(),
                    'professionals' => $professionals,
                    'speciality'=> $speciality
                ]);
            }
        }

        return $this->render('search_pro/index.html.twig', [
            'controller_name' => 'SearchProController',
            'form' => $form->createView(),
            'professionals' => $professionals,
            'postalCodeOrCity'=> $postalCodeOrCity,
            'speciality' => $speciality
        ]);
    
        
}
}
// $repository = $this->getDoctrine()->getRepository(Professionnel::class);
// $query = $repository->createQueryBuilder('p');

// $critere = $request->query->get('critere');
// $valeur = $request->query->get('valeur');

// switch ($critere) {
//     case 'ville':
//         $query->where('p.ville = :valeur')
//             ->setParameter('valeur', $valeur);
//         break;
//     case 'code_postal':
//         $query->where('p.codePostal = :valeur')
//             ->setParameter('valeur', $valeur);
//         break;
//     case 'specialite':
//         $query->join('p.specialite', 's')
//             ->where('s.nom = :valeur')
//             ->setParameter('valeur', $valeur);
//         break;
//     default:
//         throw new \Exception('Critère de recherche invalide');
// }

// $professionnels = $query->getQuery()->getResult();

// return $this->render('professionnel/recherche.html.twig', [
//     'professionnels' => $professionnels,
// ]);
// }
// }
