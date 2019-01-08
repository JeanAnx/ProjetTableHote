<?php

namespace App\Form;

use App\Entity\HostTables;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostTablesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('minPrice')
            ->add('maxPrice')
            ->add('address')
            ->add('city')
            ->add('capacity')
            ->add('tel')
            ->add('website')
            ->add('note')
            ->add('longDescription')
            ->add('shortDescription')
            ->add('img')
            ->add('zipCode')
            ->add('cookStyle')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HostTables::class,
        ]);
    }
}
