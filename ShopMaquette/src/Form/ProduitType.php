<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Fournisseur;
use App\Entity\SousCategorie;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
                ])

            ->add('quantiter', IntegerType::class, [
                'label' => 'Quantité',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,              // la quantité minimum autorisée
                    'max' => 100,           // la quantité maximum autorisée
                ],
                ])

            ->add('description', TextareaType:: class,[
                'attr' =>[
                    'class' => 'form-control',
                ],
                'label' => 'Descritption',
                'label_attr' =>[
                    'class' => 'form-label mt-4'
                ],
                ])

            ->add('prixPHUT', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Prix PHUT',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                ])

            ->add('fournisseur',EntityType::class,[
                'attr' =>[
                    'class' => 'form-control',
                ],
                'label' => 'Fournisseur',
                'label_attr' =>[
                    'class' => 'form-label mt-4'
                ],
                'class' => Fournisseur::class,
            ])
            
            ->add('souscategorie', EntityType::class,[
                'attr' =>[
                    'class' => 'form-control',
                ],
                'label' => 'Fournisseur',
                'label_attr' =>[
                    'class' => 'form-label mt-4'
                ],
                'choice_label' => 'nom',
                'multiple' => true,
                'class' => SousCategorie::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
