<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Validator\Constraints as Assert;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //Nom
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['max' => 255, 'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères'])
                ]

            ])
            //Prenom
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control col-2',
                ],
                'label' => 'Prenom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['max' => 255, 'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères'])
                ]

            ])
            //Pays
            ->add('pays', TextType::class, [
                'attr' => [
                    'class' => 'form-control col-4',
                ],
                'label' => 'Pays',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['max' => 255, 'maxMessage' => 'Le pays ne peut pas dépasser {{ limit }} caractères'])
                ]

            ])
            //Adresse
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['max' => 255, 'maxMessage' => 'Le pays ne peut pas dépasser {{ limit }} caractères'])
                ]

            ])
            //Ville
            ->add('ville', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['max' => 255, 'maxMessage' => 'La ville ne peut pas dépasser {{ limit }} caractères'])
                ]

            ])
            //CodePostal
            ->add('codepostal', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]

            ])
            //Numero de telephone
            ->add('numero', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Numero',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]

            ])
            //Email
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

        ]);
    }
}
