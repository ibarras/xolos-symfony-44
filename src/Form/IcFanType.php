<?php

namespace App\Form;

use App\Entity\Fan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IcFanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' )
            ->add('email' )
            ->add('card_image')
            ->add('face_image')
            ->add('created_at')
            ->add('updated_at')
            ->add('validate_email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fan::class,
        ]);
    }
}