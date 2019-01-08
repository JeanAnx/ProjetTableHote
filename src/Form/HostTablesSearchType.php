<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostTablesSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Where' , TextType::class , array(
                'label' => 'où ?'
            ))
            ->add('When',DateType::class, array(
                'label' => 'quand ?',
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy'
            ))
            ->add('Hour', TimeType::class, array(
                'label' => 'à quelle heure ?',
                'input' => 'timestamp',
                'widget' => 'choice',
            ))
            ->add('Seats', IntegerType::class, array(
                'label' => 'pour combien ?',
            ))
            ->add('What', ChoiceType::class, array(
                'label' => 'Qu\'est-ce qu\'on mange ?',
                'choices' => array(
                    'Traditionnel' => 'traditionnel',
                    'Gastronomique' => 'gastronomique',
                    'Bistrot' => 'bistrot',
                    'Asiatique' => 'asiatique',
                    'Indien' => 'indien',
                    'Italien' => 'italien',
                    'Mexicain' => 'mexicain',
                    'Libanais' => 'libanais',
                    'Africain' => 'africain'
                )
            ))
            ->add('Vegetarien' , CheckboxType::class , array(
                'label' => 'Végétarien'
            ))
            ->add('Vegan' , CheckboxType::class , array(
                'label' => 'Vegan'
            ))
            ->add('Sansgluten' , CheckboxType::class , array(
                'label' => 'Sans gluten'
            ))
            ->add('price' , ChoiceType::class , array(
                'label' => 'Prix par personne',
                'choices' => array(
                    'Moins de 20 euros' => '',
                    'Entre 20 et 30 euros' => '',
                    'Entre 30 et 40 euros' => '',
                    '+ de 40 euros' => '',
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'location' => "Où ?",

        ]);
    }
}
