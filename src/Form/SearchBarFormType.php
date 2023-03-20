<?php

namespace App\Form;

use App\Entity\Professionnals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchBarFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastname', TextType::class, [
            'required' => false, 
            'label' => 'Rechercher un profesionnel',
            'attr' => [
                'placeholder' => 'Nom de la personne',
            ],
        ])
        ->add('adress', TextType::class, [
            'required' => false,
            'label' => 'Adresse',
            'attr' => [
                'placeholder' => 'Adresse de la personne',
            ],
        ])
        ->add('city', TextType::class, [
            'required' => false,
            'label' => 'Ville',
            'attr' => [
                'placeholder' => 'Ville de la personne',
            ],
        ])
        ->add('speciality', TextType::class, [
            'required' => false,
            'label' => 'Spécialité',
            'attr' => [
                'placeholder' => 'Spécialité de la personne',
            ],
        ])
        ->add('search', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Professionnals::class,
        ]);
    }
}
