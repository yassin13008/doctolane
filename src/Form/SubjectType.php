<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SubjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Title', TextType::class, [
            'label' => 'Sujet du rendez vous (en quelques mots)',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => ' Remplissez ce champs'
            ],
            'constraints' => [
                new Length([
                    'max' => 50,
                    'maxMessage' => 'Le sujet de votre rendez vous  doit contenir au maximum {{ limit }} caractères.'
                ])
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}