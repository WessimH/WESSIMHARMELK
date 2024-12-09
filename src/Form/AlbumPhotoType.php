<?php

namespace App\Form;

use App\Entity\AlbumPhoto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumPhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Entrez le titre de l\'album']
            ])
            ->add('description', null, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Entrez la description de l\'album']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AlbumPhoto::class,
        ]);
    }
}
