<?php

namespace App\Form;

use App\Entity\CamilleLaChenille;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CamilleLaChenilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rate',  IntegerType::class,[ 
                'attr' => [
                    'min' => 0,
                    'max' => 5
                  ]
            ])
            ->add('nickname')
            ->add('idMovie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CamilleLaChenille::class,
        ]);
    }
}
