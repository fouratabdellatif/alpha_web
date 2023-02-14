<?php

namespace App\Form;

use App\Entity\Remorquage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RemorquageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameRemorquage')
            ->add('prenom')
            ->add('emailRemorquage')
            ->add('password')
            ->add('numeroTel')
            ->add('serv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Remorquage::class,
        ]);
    }
}
