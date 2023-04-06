<?php

namespace App\Form;

use App\Entity\Aviability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Validator\Constraints as Assert;

class AviabilityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startDate', DateTimeType::class, [
                'date_widget' => 'single_text',
                'view_timezone' => 'Europe/Paris',
                'model_timezone' => 'GMT',
                'label' => 'A partir de quand êtes vous disponible '
            ])
            ->add('endDate', DateTimeType::class, [
                'date_widget' => 'single_text',
                'view_timezone' => 'Europe/Paris',
                'model_timezone' => 'GMT',
                'label' => 'Jusqu\'a quand êtes vous disponible'
            ])
            ->add('startTime', TimeType::class, [
                'label' => 'A quel heure voulez vous commencez ',
            ])
            ->add('endTime', TimeType::class, [
                'label' => 'A quel heure voulez vous finir '
            ])
            ->add('durationDate', IntegerType::class,[
                'constraints' => [
                    new Assert\Range([
                        'min' => 0,
                        'max' => 60,
                        'notInRangeMessage' => "Le temps de vos rendez vous doit se situer entre {{ min }} et {{ max }} minutes.",
                        'invalidMessage' => "Le nombre de minutes doit se situer dans la tranche donnée",
                    ])
                    ],
                    'label' => 'Combien de minutes vos rendez vous sont censés durer ?'
            ])
            ->add('gapDate', IntegerType::class,[
                'constraints' => [
                    new Assert\Range([
                        'min' => 0,
                        'max' => 15,
                        'notInRangeMessage' => "Le temps de vos rendez vous doit se situer entre {{ min }} et {{ max }} minutes.",
                        'invalidMessage' => "Le nombre de minutes doit se situer dans la tranche donnée",
                    ])
                    ],
                    'label' => 'Mettez un délais entre deux rendez vous ici '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Aviability::class,
        ]);
    }
}
