<?php

namespace App\Form;

use App\Entity\Specialities;
use App\Entity\Professionnals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchProType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('postalCodeOrCity', TextType::class, [
            'label' => 'Code postal ou ville',
            'attr'=> [
                'class' => 'form-control',
                'placeholder' => 'Ajoutez votre code postal ou bien votre ville ici '
            ],
            'required' => false,
        ])
        ->add('speciality', EntityType::class, [
            'class' => Specialities::class,
            'choice_label' => 'speciality_label',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Ajoutez votre domaine de spécialité'
            ],
            'label' => 'Choisissez votre spécialité !!',
            'required' => false,
        ])
        ->add('search', SubmitType::class, [
            'label' => 'Rechercher',
            'attr' => [
                'class'=>'btn btn-outline-success'
                ]
        ]);
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'csrf_protection' => true,
    ]);
}
}