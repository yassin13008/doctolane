<?php

namespace App\Form;


use App\Entity\Appointment;
use Symfony\Component\Form\AbstractType;
use App\Repository\AppointmentRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options,): void
    {

        $builder
            ->add('Title')

            ->add('start', DateTimeType::class, [
                'date_widget' => 'single_text',
                'view_timezone' => 'Europe/Paris',
                'model_timezone' => 'GMT',
                'minutes' => [0, 30],
            ])
            ->add('end', DateTimeType::class, [
                'date_widget' => 'single_text',
                'view_timezone' => 'Europe/Paris',
                'model_timezone' => 'GMT',
                'minutes' => [0, 30],
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
