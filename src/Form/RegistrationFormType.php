<?php

namespace App\Form;

use App\Entity\Doctors;
use App\Entity\Expertises;
use App\Entity\Specialities;
use App\Form\SearchableEntityType;
use Symfony\Component\Form\AbstractType;
use App\Repository\SpecialitiesRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre nom'
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre prenom',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre prenom'
            ])
            ->add('adress', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre adresse',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre adresse'
            ])
            ->add('postal_code', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre code postal',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre code postal'
            ])
            ->add('phoneNumber', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre numéro de téléphone',
                    'class' => 'form-control'
                ],
                'label'=> 'Votre numéro de téléphone'
            ])
            ->add('speciality', EntityType::class, [
                'class' => Specialities::class,
                'choice_label' => 'speciality_label',
                'placeholder' => 'Choisissez votre spécialités',
            ])
            // ->add('expertises', EntityType::class, [
            //     'class' => SearchableEntityType::class
            // ])
            ->add('email', EmailType::class, [
                'attr'=> [
                    'placeholder' => 'Votre email',
                    'class' => 'form-control'
                ],
                'label' => 'Votre email'
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label' => 'Veuillez accepter nos conditions d\'utilisation '
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Doctors::class,
            'specialities' => []
        ]);
    }
}
