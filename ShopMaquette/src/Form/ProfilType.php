<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]

            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],

            ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],

            ])
            ->add('codepostal', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],

            ])
            ->add('numero', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],

            ])

            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

        ]);
    }
}
