<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '120'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('imageFile', VichImageType::class, [
                'label'=> 'Image pour le produit',
                'required' => false,
                'label_attr' => [
                    'class' => 'form mt-4 my-2 mt-4'
                ]
            ])
            
            ->add('produit', EntityType::class,[
                'attr' =>[
                    'class' => 'form-control',
                ],
                'label' => 'Produit',
                'label_attr' =>[
                    'class' => 'form-label mt-4'
                ],
                'choice_label' => 'nom',
                'class' => Produit::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
