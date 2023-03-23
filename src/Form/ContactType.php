<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', TextType::class, [
                'label'=>'Sujet de votre message ',
                'attr' => [
                    'placeholder' => 'Insérer votre message ici ',
                    'class' => 'form-control'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label'=>'Votre message',
                'attr'=> [
                    'placeholder'=> 'Insérer votre message ici',
                    'class' => 'form-control'
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
