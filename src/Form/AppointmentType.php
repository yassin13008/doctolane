<?php

namespace App\Form;


use App\Entity\Appointment;
use Symfony\Component\Form\AbstractType;
use App\Repository\AppointmentRepository;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options,): void
    {

        $builder
            ->add('Title', TextType::class, [
                'label' => 'Sujet du rendez vous (en quelques mots)',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => ' Remplissez ce champs'
                ]
            ])

            ->add('start', DateTimeType::class, [
                'label' => 'Début du rendez-vous',
                'date_widget' => 'single_text',
                'view_timezone' => 'Europe/Paris',
                'model_timezone' => 'GMT',

            ])
            ->add('end', DateTimeType::class, [
                'label' => 'Fin du rendez-vous',
                'date_widget' => 'single_text',
                'view_timezone' => 'Europe/Paris',
                'model_timezone' => 'GMT',

            ])
            ->add('isDispo', CheckboxType::class,[
                'required' => false,
                'label' => 'Si vous décochez ici, ce créneau sera rendu indisponible'
            ])
            // ->add('professionnal')
            // ->add('patient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
