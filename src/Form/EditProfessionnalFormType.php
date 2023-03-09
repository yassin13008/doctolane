<?php

namespace App\Form;

use App\Entity\Specialities;
use App\Entity\Professionnals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

// ATTENTION ICI IL N Y A PAS LE CHAMPS MDP, CE FORMULAIRE EST DESTINEE A SEULEMENT LA MODIF DU PROFIL UTILISATEUR PROFESSIONNAL
// POUR CHANGER LE MOT DE PASSE UN FORMULAIRE MANUELLE (SANS SYMFONY)A ETE CREE UNIQUEMENT POUR CA PAR SECURITE
// ALLER SUR LE TEMPLACE PROFILE/EDIT PASSWORD 

// CELA VAUT AUSSI POUR LE EDIT PATIENT FORM TYPE 

// section Class d'enregistrement des utilisateurs patients !! 

class EditProfessionnalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom d\'utilisateur ',
                    'class' => 'form-control'
                ],
                'label' => 'Votre nom d\'utilisateur'
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'class' => 'form-control'
                ],
                'label' => 'Votre nom'
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre prenom',
                    'class' => 'form-control'
                ],
                'label' => 'Votre prenom'
            ])
            ->add('adress', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre adresse',
                    'class' => 'form-control'
                ],
                'label' => 'Votre adresse'
            ])
            ->add('postalCode', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre code postal',
                    'class' => 'form-control'
                ],
                'label' => 'Votre code postal'
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre ville',
                    'class' => 'form-control'
                ],
                'label' => 'Votre ville'
            ])
            ->add('phoneNumber', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre numero de telephone',
                    'class' => 'form-control'
                ],
                'label' => 'Votre numero de téléphone'
            ])
            ->add('speciality', EntityType::class, [
                'class' => Specialities::class,
                'choice_label' => 'speciality_label',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ajoutez votre domaine de spécialité'
                ],
                'label' => 'Choisissez votre spécialité !!' 
            ])
            ->add('expertises', TextareaType::class, [
                "attr" => [
                    'placeholder' => ' Donnez plus de détails sur votre domaine d\'expertises !',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre domaine d\'expertise  '
            ])
            ->add('email', EmailType::class, [
                "attr" => [
                    'placeholder' => 'Votre email !',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre email '
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professionnals::class,
        ]);
    }
}
