<?php

namespace App\Form;

use App\Entity\Patients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditPatientFormType extends AbstractType
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
            'data_class' => Patients::class,
        ]);
    }
}
