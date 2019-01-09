<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostTablesSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location' , TextType::class , array(
                'label' => 'Où ?',
                'attr' => ['class' => 'form-group col-md-12'],
                'required' => false,
            ))
            ->add('date',DateType::class, array(
                'label' => 'Quand ?',
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'required' => false,

            ))
            ->add('time', TimeType::class, array(
                'label' => 'À quelle heure ?',
                'input' => 'timestamp',
                'widget' => 'choice',
                'required' => false,
            ))
            ->add('seats', IntegerType::class, array(
                'label' => 'Pour combien ?',
                'required' => false,

            ))
            ->add('style', ChoiceType::class, array(
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
                ),
                'required' => false,

            ))
            ->add('vegetarien' , CheckboxType::class , array(
                'label' => 'Végétarien',
                'required' => false,

            ))
            ->add('vegan' , CheckboxType::class , array(
                'label' => 'Vegan',
                'required' => false,

            ))
            ->add('sansgluten' , CheckboxType::class , array(
                'label' => 'Sans gluten',
                'required' => false,

            ))
            ->add('price' , ChoiceType::class , array(
                'label' => 'Prix par personne',
                'choices' => array(
                    'Moins de 20 euros' => '',
                    'Entre 20 et 30 euros' => '',
                    'Entre 30 et 40 euros' => '',
                    '+ de 40 euros' => '',
                ),
                'required' => false,

            ))
            ->add('search' , SubmitType::class, array(
                'label' => 'recherche',
                'attr' => [ 'class' => 'btn'],
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
